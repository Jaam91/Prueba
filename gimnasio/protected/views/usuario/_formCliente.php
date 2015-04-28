<?php
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	)
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model);
		  echo $form->errorSummary($cliente); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_usuario'); ?>
		<?php echo $form->textField($model,'rut_usuario',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rut_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Primer Nombre'); ?>
		<?php echo $form->textField($model,'primer_nombre',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'primer_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'segundo_nombre'); ?>
		<?php echo $form->textField($model,'segundo_nombre',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'segundo_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'primer_apellido'); ?>
		<?php echo $form->textField($model,'primer_apellido',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'primer_apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'segundo_apellido'); ?>
		<?php echo $form->textField($model,'segundo_apellido',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'segundo_apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
		<?php echo $form->textField($model,'fecha_nacimiento'); ?>
		<?php echo $form->error($model,'fecha_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nacionalidad'); ?>
		<?php echo $form->textField($model,'nacionalidad',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo $form->textField($model,'contrasena',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'contrasena'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cliente,'telefono_emergencia'); ?>
		<?php echo $form->textField($cliente,'telefono_emergencia',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($cliente,'telefono_emergencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cliente,'peso'); ?>
		<?php echo $form->textField($cliente,'peso'); ?>
		<?php echo $form->error($cliente,'peso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cliente,'altura'); ?>
		<?php echo $form->textField($cliente,'altura'); ?>
		<?php echo $form->error($cliente,'altura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($cliente,'enfermedades_previas'); ?>
		<?php echo $form->textArea($cliente,'enfermedades_previas',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($cliente,'enfermedades_previas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Save', array("class"=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->