<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
)); ?>

	<div class="row">
		<?php echo '<b>Tanggal : </b>' ?>
		<?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model1,
                    'value'=>CTimestamp::formatDate('yyyy-MM-dd',$model1->tanggal_stok),
                    'attribute'=>'tanggal_stok',
                    'options'=>array(
                        'showAnim'=>'slide',
                        'dateFormat'=>'yy-mm-dd',
                    ),
                    'htmlOptions'=>array(
                    'style'=>'height:20px;',
                    ),
                ));
                ?>
                <?php 
                    echo CHtml::submitButton('Print', array('name'=>'print', 'formtarget'=>"_blank")); 
                    echo CHtml::submitButton('Submit', array('name'=>'submit'));
                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->