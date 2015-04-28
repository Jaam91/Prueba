<?php
/* @var $this AsignacionInstructController */
/* @var $data AsignacionInstructor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_asignacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_asignacion), array('view', 'id'=>$data->id_asignacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_instructor')); ?>:</b>
	<?php echo CHtml::encode($data->rut_instructor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->rut_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_actividad')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_actividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>