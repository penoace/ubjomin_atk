<?php
$this->menu=array(
	array('label'=>'Daftar Barang', 'url'=>array('index')),
	array('label'=>'Input Barang', 'url'=>array('create')),
);
?>

<h1>Update Barang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>