<?php
$this->menu=array(
	array('label'=>'Daftar Barang Keluar', 'url'=>array('index')),
	array('label'=>'Input Barang Keluar', 'url'=>array('create')),
);
?>

<h1>Update Barang Keluar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data_barang'=>$data_barang, 'data_bidang'=>$data_bidang)); ?>