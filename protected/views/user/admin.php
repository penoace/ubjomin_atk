<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Create', 'url'=>array('create'), 'visible'=>  Yii::app()->user->getLevel()==1), 
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'class'=>'IndexColumn',
                    'header'=>'No',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center'),
                ),
		'username',
		array(
                    'name'=>'password',
                    'value'=>'"xxxxxxxxxx"'
                ),
//		array(
//                    'name'=>'level',
//                    'htmlOptions'=>array('style'=>'width:60px; text-align:center'),
//                ),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}{delete}'
		),
	),
)); ?>
