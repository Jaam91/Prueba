<?php
/* @var $this AsignacionUnidadController */
/* @var $model AsignacionUnidad */

$this->breadcrumbs=array(
	'Seleccionar Cliente',
);
?>

<h2>Asignación de Instructor de Entrenamiento</h2>
<p> Seleccione un Cliente y luego seleccione el tipo de Instructor</p>

<?php $this->renderPartial('_form', array('model'=>$model,'cliente'=>$cliente, 'tipo'=>$tipo)); ?>