<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            if (Yii::app()->user->isGuest) {
                $this->actionLogin();
            } else {
                $model1 = new Barang;
                Yii::import('ext.fungsiku.Fungsi');
                $tanggal = date('Y-m-d');
                    // renders the view file 'protected/views/site/index.php'
                    // using the default layout 'protected/views/layouts/main.php'
                if (isset($_POST['Barang'])) {
                    $model1->tanggal_stok =$_POST['Barang']['tanggal_stok'];
                    $tanggal_form = $_POST['Barang']['tanggal_stok'];
                    if ($tanggal_form!='')
                        $tanggal = $tanggal_form;
                }
    //            $sql = "SELECT id, nama, rincian, satuan, min_stok, (SUM(masuk)-SUM(keluar)) AS stok
    //                    FROM
    //                    (
    //                    SELECT a.id, a.nama, a.rincian, a.satuan, a.min_stok, (SELECT IFNULL(sum(b.jumlah), 0)) AS masuk, 0 AS keluar FROM t_barang a LEFT JOIN t_transaksi_masuk b ON a.id=b.barang_id WHERE (b.tanggal BETWEEN '0000-00-00' AND '$tanggal') GROUP BY a.id
    //                    UNION
    //                    SELECT a.id, a.nama, a.rincian, a.satuan, a.min_stok, 0 AS masuk, (SELECT IFNULL(sum(c.jumlah), 0)) AS keluar FROM t_barang a LEFT JOIN t_transaksi_keluar c ON a.id=c.barang_id WHERE (c.tanggal BETWEEN '0000-00-00' AND '$tanggal') GROUP BY a.id
    //                    )
    //                    as t1
    //                    GROUP BY id
    //                    ORDER BY nama
    //                    ";
                $filtersForm=new FiltersForm;

                if (isset($_GET['FiltersForm']))
                    $filtersForm->filters=$_GET['FiltersForm'];

    //            $command = Yii::app()->db->createCommand($sql);
    //            $rows = $command->queryAll(true);
                $data = Barang::model()->report($tanggal);

                //print report
                $options = array(
                    'filename'  => 'Stok_'.$tanggal.'.pdf' ,
                    'destinationfile'  => 'I' ,
                    'paper_size' =>'' ,
                    'orientation' =>''
                );
                if (isset($_POST['print'])) {
                    $pdf = new FStokBarang($data, $options, $tanggal);
                    $pdf->printPDF();
                }

                $filteredData=$filtersForm->filter($data);
                $dataProvider = new CArrayDataProvider($filteredData, array(
                                    'pagination'=>array(
                                        'pageSize'=>10,
                                ),
                ));
                $tanggal_fix = new Fungsi();
                $tanggal_view = $tanggal_fix->waktuIndo($tanggal);

                // Render
                $this->render('index', array(
                    'filtersForm' => $filtersForm,
                    'model' => $dataProvider,
                    'model1'=> $model1,
                    'tanggal'=> $tanggal_view
                ));
            }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}