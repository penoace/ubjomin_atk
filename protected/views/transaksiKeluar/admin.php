<?php

$this->menu=array(
	array('label'=>'Input Barang Keluar', 'url'=>array('create')),
);
?>

<h1>Daftar Barang Keluar</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'data_bidang'=>$data_bidang
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transaksi-keluar-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
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
                    'name'=>'bidang_id',
                    'value'=>'$data->r_bidang->nama'
                ),
		array(
                    'name'=>'barang_id',
                    'value'=>'$data->r_barang->nama',
                    'htmlOptions'=>array('style'=>'width:200px;')
                ),
                array(
                    'header'=>'Satuan',
                    'value'=>'$data->r_barang->satuan',
                    'htmlOptions'=>array('style'=>'width:100px;')
                ),
                array(
                    'name'=>'jumlah',
                    'htmlOptions'=>array('style'=>'width:40px; text-align:right')
                ),
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{delete}{update}'
		),
	),
)); ?>
