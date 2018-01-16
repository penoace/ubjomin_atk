<?php
$this->menu=array(
	array('label'=>'Daftar Barang Keluar', 'url'=>array('index')),
);
?>

<h1>Input Barang Keluar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data_barang'=>$data_barang, 'data_bidang'=>$data_bidang)); ?>