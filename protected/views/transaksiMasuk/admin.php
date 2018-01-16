<?php
$this->menu=array(
	array('label'=>'Input Barang Masuk', 'url'=>array('create')),
);

?>

<h1>Daftar Barang Masuk</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); echo $model->awal; ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transaksi-masuk-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                    'header'=>'No',
                    'class'=>'IndexColumn',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center')
                ),
		array(
                    'name'=>'tanggal',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:center')
                ),
		array(
                    'name'=>'barang_id',
                    'value'=>'$data->r_barang->nama'
                ),
		array(
                    'name'=>'jumlah',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:right')
                ),
                array(
                    'header'=>'Satuan',
                    'value'=>'$data->r_barang->satuan'
                ),
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{delete}{update}'
		),
	),
)); ?>
