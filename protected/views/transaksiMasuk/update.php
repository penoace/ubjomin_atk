<?php

$this->menu=array(
	array('label'=>'Daftar Barang Masuk', 'url'=>array('index')),
	array('label'=>'Input Barang Masuk', 'url'=>array('create')),
);
?>

<h1>Update Barang Masuk</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data_barang'=>$data_barang)); ?>