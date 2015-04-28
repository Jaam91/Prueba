<?php
/* @var $this InstructorController */
/* @var $data Instructor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut_usuario), array('view', 'id'=>$data->rut_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profesion')); ?>:</b>
	<?php echo CHtml::encode($data->profesion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curriculum_vitae')); ?>:</b>
	<?php echo CHtml::encode($data->curriculum_vitae); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />


</div>