<?php

$this->menu=array(
	array('label'=>'Daftar Bidang', 'url'=>array('index')),
	array('label'=>'Input Bidang', 'url'=>array('create')),
);
?>

<h1>Update Bidang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>