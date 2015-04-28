<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instructor', 'url'=>array('index')),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);
?>

<h1>Create Instructor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>