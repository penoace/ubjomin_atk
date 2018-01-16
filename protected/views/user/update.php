<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
        $model->username=>array('view','id'=>$model->id),
	'Update',
        
);

?>

<h1>Ganti Password</h1>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>