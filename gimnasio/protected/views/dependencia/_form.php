<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dependencia'); ?>
		<?php echo $form->textField($model,'id_dependencia',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'id_dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metros_cuadrados'); ?>
		<?php echo $form->textField($model,'metros_cuadrados',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'metros_cuadrados'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->