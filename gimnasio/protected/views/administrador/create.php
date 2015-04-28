<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Administradors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Administrador', 'url'=>array('index')),
	array('label'=>'Manage Administrador', 'url'=>array('admin')),
);
?>

<h1>Create Administrador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>