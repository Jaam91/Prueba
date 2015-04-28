<?php
/* @var $this AsignacionInstructorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asignacion Instructors',
);

$this->menu=array(
	array('label'=>'Create AsignacionInstructor', 'url'=>array('create')),
	array('label'=>'Manage AsignacionInstructor', 'url'=>array('admin')),
);
?>

<h1>Asignacion Instructors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
