<?php
/* @var $this AsignacionInstructController */
/* @var $model AsignacionInstructor */

$this->breadcrumbs=array(
	'Asignacion Instructors'=>array('index'),
	$model->id_asignacion,
);

$this->menu=array(
	array('label'=>'List AsignacionInstructor', 'url'=>array('index')),
	array('label'=>'Create AsignacionInstructor', 'url'=>array('create')),
	array('label'=>'Update AsignacionInstructor', 'url'=>array('update', 'id'=>$model->id_asignacion)),
	array('label'=>'Delete AsignacionInstructor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_asignacion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AsignacionInstructor', 'url'=>array('admin')),
);
?>

<h1>View AsignacionInstructor #<?php echo $model->id_asignacion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_asignacion',
		'rut_instructor',
		'rut_cliente',
		'nombre_actividad',
		'estado',
	),
)); ?>
