<?php

$this->menu=array(
	array('label'=>'Daftar Barang', 'url'=>array('index')),
);
?>

<h1>Input Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>