<?php

$this->menu=array(
	array('label'=>'Daftar Masuk', 'url'=>array('index')),
);
?>

<h1>Input Barang Masuk</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'data_barang'=>$data_barang)); ?>