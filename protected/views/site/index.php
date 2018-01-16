<h1 style="text-align: center">Stok Barang</h1>

<?php
echo '<h2 style="text-align:center"> Periode : '.  $tanggal .'</h2>';
$this->menu=array(
	array('label'=>'Input Barang', 'url'=>array('create')),
);

?>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model1'=>$model1,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barang-grid',
	'dataProvider'=>$model,
	'filter'=>$filtersForm,
	'columns'=>array(
		array(
                    'header'=>'No',
                    'class'=>'IndexColumn',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center')
                ),
		array(
                    'header'=>'Nama',
                    'name'=>'nama',
                ),
//		'rincian',
		array(
                    'header'=>'Satuan',
                    'name'=>'satuan',
                    'htmlOptions'=>array('style'=>'width:100px; text-align:left')
                ),
		array(
                    'header'=>'Stok Minimum',
                    'name'=>'min_stok',
                    'htmlOptions'=>array('style'=>'width:100px; text-align:center')
                ),
                array(
                    'header'=>'Stok Tersedia',
                    'name'=>'stok',
                    'htmlOptions'=>array('style'=>'width:100px; text-align:center')
                ),
//		array(
//			'class'=>'CButtonColumn',
//                        'htmlOptions'=>array('style'=>'width:20px; text-align:center'),
//                        'template'=>'{delete}{update}'
//		),
	),
)); ?>
