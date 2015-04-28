<?php
/* @var $this AsignacionInstructController */
/* @var $model AsignacionInstructor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asignacion-instructor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_instructor'); ?>
		<?php echo $form->textField($model,'rut_instructor',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_instructor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_cliente'); ?>
		<?php echo $form->textField($model,'rut_cliente',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_actividad'); ?>
		<?php echo $form->textField($model,'nombre_actividad',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombre_actividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->