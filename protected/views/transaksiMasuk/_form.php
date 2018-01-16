<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transaksi-masuk-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php
                echo $form->labelEx($model,'tanggal');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'value'=>CTimestamp::formatDate('yyyy-MM-dd',$model->tanggal),
                    'attribute'=>'tanggal',
                    'options'=>array(
                        'showAnim'=>'slide',
                        'dateFormat'=>'yy-mm-dd',
                    ),
                    'htmlOptions'=>array(
                    'style'=>'height:20px;',
                    ),
                ));
                ?>
	</div>    

	<div class="row">
		<?php echo $form->labelEx($model,'barang_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'barang_id', $data_barang);?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->