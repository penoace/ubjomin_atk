<?php

$this->menu=array(
	array('label'=>'Daftar Bidang', 'url'=>array('index')),
);
?>

<h1>Input Bidang</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>