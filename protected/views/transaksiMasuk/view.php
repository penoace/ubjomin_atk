<?php
$this->breadcrumbs=array(
	'Transaksi Masuks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TransaksiMasuk', 'url'=>array('index')),
	array('label'=>'Create TransaksiMasuk', 'url'=>array('create')),
	array('label'=>'Update TransaksiMasuk', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TransaksiMasuk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TransaksiMasuk', 'url'=>array('admin')),
);
?>

<h1>View TransaksiMasuk #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tanggal',
		'barang_id',
		'jumlah',
	),
)); ?>
