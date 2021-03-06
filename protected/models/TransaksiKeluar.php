<?php

/**
 * This is the model class for table "t_transaksi_keluar".
 *
 * The followings are the available columns in table 't_transaksi_keluar':
 * @property integer $id
 * @property string $tanggal
 * @property integer $bidang_id
 * @property integer $barang_id
 * @property integer $jumlah
 */
class TransaksiKeluar extends CActiveRecord
{
    public $awal, $akhir;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TransaksiKeluar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_transaksi_keluar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, bidang_id, barang_id, jumlah', 'required'),
			array('bidang_id, barang_id, jumlah', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tanggal, bidang_id, barang_id, jumlah, awal, akhir', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'r_barang'=>array(self::BELONGS_TO, 'Barang', 'barang_id'),
                    'r_bidang'=>array(self::BELONGS_TO, 'Bidang', 'bidang_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal',
                        'bidang_id'=>'Bidang',
			'barang_id' => 'Nama Barang',
			'jumlah' => 'Jumlah',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with = array('r_barang', 'r_bidang');
                $criteria->order = 'tanggal DESC';
                if ($this->awal!=''|| $this->akhir!='')
                    $criteria->addBetweenCondition('tanggal', $this->awal, $this->akhir);
		$criteria->compare('id',$this->id);
                $criteria->compare('bidang_id',$this->bidang_id);
//		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('r_barang.nama',$this->barang_id, true);
		$criteria->compare('jumlah',$this->jumlah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function report($bidang, $awal, $akhir) {
            $query = "
                    SELECT
                    A.nama,
                    A.satuan,
                    B.tanggal,
                    SUM(B.jumlah) AS jumlah
                    FROM
                    t_barang A
                    INNER JOIN
                    t_transaksi_keluar B
                    ON A.id=B.barang_id
                    WHERE (B.tanggal BETWEEN '$awal' AND '$akhir')";
            if ($bidang!='')         
                $query = $query .' AND B.bidang_id=:bidang ';
            $query = $query .' GROUP BY A.id ORDER BY A.nama';
                $commad = Yii::app()->db->createCommand($query);
                $data= $commad->queryAll(true, array(
                    ':bidang'=>$bidang,
                ));
                return $data;
        }
        
}