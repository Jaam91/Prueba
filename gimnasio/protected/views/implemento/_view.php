<?php
/* @var $this ImplementoController */
/* @var $data Implemento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_implemento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_implemento), array('view', 'id'=>$data->id_implemento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dependencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_dependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:</b>
	<?php echo CHtml::encode($data->ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo_muscular')); ?>:</b>
	<?php echo CHtml::encode($data->grupo_muscular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>