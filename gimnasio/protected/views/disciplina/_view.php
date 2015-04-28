<?php
/* @var $this DisciplinaController */
/* @var $data Disciplina */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->nombre)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_mensualidad')); ?>:</b>
	<?php echo CHtml::encode($data->valor_mensualidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>