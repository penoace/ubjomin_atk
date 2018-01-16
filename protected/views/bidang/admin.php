<?php

$this->menu=array(
	array('label'=>'Input Bidang', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bidang-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Bidang</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bidang-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                  'header'=>'No',
                    'class'=>'IndexColumn',
                    'htmlOptions'=>array('style'=>'text-align:center; width:40px')
                ),
		'nama',
		array(
			'class'=>'CButtonColumn',
                    'template'=>'{delete}{update}'
		),
	),
)); ?>
