<?php
$this->breadcrumbs=array(
	'Transaksi Masuks',
);

$this->menu=array(
	array('label'=>'Create TransaksiMasuk', 'url'=>array('create')),
	array('label'=>'Manage TransaksiMasuk', 'url'=>array('admin')),
);
?>

<h1>Transaksi Masuks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
