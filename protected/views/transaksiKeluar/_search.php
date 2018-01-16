<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
)); ?>
	<div class="row">
		<?php echo '<b>Bidang' ?>
                <?php echo CHtml::activeDropDownList($model, 'bidang_id', $data_bidang, array('empty'=>'- Semua Bidang -')); ?>
		<?php
                    echo "Tanggal ";
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'value'=>CTimestamp::formatDate('yyyy-MM-dd',$model->awal),
                        'attribute'=>'awal',
                        'options'=>array(
                            'showAnim'=>'slide',
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                        'style'=>'height:20px;',
                        ),
                    ));
                    echo " s/d ";
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'value'=>CTimestamp::formatDate('yyyy-MM-dd',$model->akhir),
                        'attribute'=>'akhir',
                        'options'=>array(
                            'showAnim'=>'slide',
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                        'style'=>'height:20px;',
                        ),
                    ));
                  echo " </b> ";  
                ?>
	</div>
        <div class="row" style="text-align: right">
            <?php echo CHtml::submitButton('Print', array('name'=>'print', 'formtarget'=>"_blank")); ?>
            <?php echo CHtml::submitButton('Search', array('name'=>'search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->