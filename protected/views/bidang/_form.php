<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bidang-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Tanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->