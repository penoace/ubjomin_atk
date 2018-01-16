<?php
$this->breadcrumbs=array(
	'Bidangs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bidang', 'url'=>array('index')),
	array('label'=>'Create Bidang', 'url'=>array('create')),
	array('label'=>'Update Bidang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bidang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bidang', 'url'=>array('admin')),
);
?>

<h1>View Bidang #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>
