<?php
$this->breadcrumbs=array(
	'Transaksi Keluars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TransaksiKeluar', 'url'=>array('index')),
	array('label'=>'Create TransaksiKeluar', 'url'=>array('create')),
	array('label'=>'Update TransaksiKeluar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TransaksiKeluar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TransaksiKeluar', 'url'=>array('admin')),
);
?>

<h1>View TransaksiKeluar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tanggal',
		'barang_id',
		'jumlah',
	),
)); ?>
