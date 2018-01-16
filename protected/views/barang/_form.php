<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'barang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rincian'); ?>
		<?php echo $form->textArea($model,'rincian',array('cols'=>69, 'rows'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_stok'); ?>
		<?php echo $form->textField($model,'min_stok'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->