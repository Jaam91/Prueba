<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Opciones'=>array('ingresa'),
	'Ingresar',
);

$this->menu=array(
	array('label'=>'Ingresar Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
	array('label'=>'Habilitar Actividad', 'url'=>array('lista')),
);
?>

<h1>Ingresar Actividad</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista'=>$lista, 'lista_d'=>$lista_d)); ?>