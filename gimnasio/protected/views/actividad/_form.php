<?php
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actividad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_dependencia'); ?>
		<?php echo $form->dropDownList($model,'id_dependencia', CHtml::listData($lista_d, 'id_dependencia', 'id_dependencia'), array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'id_dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_disciplina'); ?>
		<?php echo $form->dropDownList($model,'nombre_disciplina', CHtml::listData($lista, 'nombre', 'nombre'), array('empty'=>'Seleccione')
										,array(
									  	'ajax'=>array(
									  		'type'=>'POST',
									  		'url'=>CController::createUrl('Select'), // funcion en Controller
									  		'update'=>'#'.CHtml::activeId($model,'rut_instructor'),
									  		), 'prompt'=>'Seleccione'
										)); ?>
		<?php echo $form->error($model,'nombre_disciplina'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->