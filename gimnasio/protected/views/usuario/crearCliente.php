<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Opciones'=>array('ingresar'),
	'Ingresar Cliente',
);

$this->menu=array(
	array('label'=>'Ingresar Cliente', 'url'=>array('crearCliente')),
	array('label'=>'Gestión de Clientes', 'url'=>array('cliente/admin')),
	array('label'=>'Habilitar Cliente', 'url'=>array('cliente/lista')),
);
?>

<h2>Ingresar Cliente</h2>

<?php $this->renderPartial('_formCliente', array('model'=>$model, 'cliente'=>$cliente)); ?>