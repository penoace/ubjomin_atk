<div class="form" style="margin: 0 auto; width: 300px; text-align: center; border: 1px solid grey; border-radius: 5px 10px; padding: 10px; background: whitesmoke; box-shadow: 1px -1px 5px #000000 " >
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
        <?php echo CHtml::image(Yii::app()->baseUrl.'/images/login.png', 'Login', array('style'=>'width:100px'));?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
