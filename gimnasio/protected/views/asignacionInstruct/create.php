<?php
/* @var $this AsignacionInstructController */
/* @var $model AsignacionInstructor */

$this->breadcrumbs=array(
	'Asignacion Instructors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AsignacionInstructor', 'url'=>array('index')),
	array('label'=>'Manage AsignacionInstructor', 'url'=>array('admin')),
);
?>

<h1>Create AsignacionInstructor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>