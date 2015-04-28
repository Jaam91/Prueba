<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */

$this->breadcrumbs=array(
	'Opciones'=>array('OpcionesModulo'),
	'Ingresar',
);

$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearDependencia')),
	array('label'=>'Gestión de Dependencias', 'url'=>array('admin')),
);
?>

<h2>Ingresar Dependencia</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>