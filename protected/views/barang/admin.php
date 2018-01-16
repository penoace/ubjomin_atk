<?php

$this->menu=array(
	array('label'=>'Input Barang', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('barang-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar Barang</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'header'=>'No',
                    'class'=>'IndexColumn',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center')
                ),
		array(
                    'name'=>'nama',
                    'htmlOptions'=>array('style'=>'width:175px;')
                ),
		'rincian',
		array(
                    'name'=>'satuan',
                    'htmlOptions'=>array('style'=>'width:100px; text-align:left')
                ),
		array(
                    'name'=>'min_stok',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center')
                ),
		array(
			'class'=>'CButtonColumn',
                        'htmlOptions'=>array('style'=>'width:20px; text-align:center'),
                        'template'=>'{delete}{update}'
		),
	),
)); ?>
