<?php
/* @var $this AsignacionInstructorController */
/* @var $model AsignacionInstructor */

$this->breadcrumbs=array(
	'Asignacion Instructors'=>array('index'),
	$model->id_asignacion=>array('view','id'=>$model->id_asignacion),
	'Update',
);

$this->menu=array(
	array('label'=>'List AsignacionInstructor', 'url'=>array('index')),
	array('label'=>'Create AsignacionInstructor', 'url'=>array('create')),
	array('label'=>'View AsignacionInstructor', 'url'=>array('view', 'id'=>$model->id_asignacion)),
	array('label'=>'Manage AsignacionInstructor', 'url'=>array('admin')),
);
?>

<h1>Update AsignacionInstructor <?php echo $model->id_asignacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>