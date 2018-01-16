<?php
$this->breadcrumbs=array(
	'Transaksi Keluars',
);

$this->menu=array(
	array('label'=>'Create TransaksiKeluar', 'url'=>array('create')),
	array('label'=>'Manage TransaksiKeluar', 'url'=>array('admin')),
);
?>

<h1>Transaksi Keluars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
