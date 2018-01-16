<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
)); ?>

	<div class="row">
		<?php 
                    echo "<b>Tanggal ";
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
                <?php echo CHtml::submitButton('Print', array('name'=>'print', 'formtarget'=>"_blank")); ?>
                <?php echo CHtml::submitButton('Search', array('name'=>'search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->