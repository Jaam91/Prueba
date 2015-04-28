<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Opciones'=>array('ingresar'),
	'Gestionar'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Ingresar Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
	array('label'=>'Habilitar Actividad', 'url'=>array('lista')),
);
?>

<h1>Modificar Actividad <?php echo $model->id_actividad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista_d'=>$lista_d, 'lista'=>$lista)); ?>