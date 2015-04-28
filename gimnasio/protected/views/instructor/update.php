<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->rut_usuario=>array('view','id'=>$model->rut_usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instructor', 'url'=>array('index')),
	array('label'=>'Create Instructor', 'url'=>array('create')),
	array('label'=>'View Instructor', 'url'=>array('view', 'id'=>$model->rut_usuario)),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);
?>

<h1>Update Instructor <?php echo $model->rut_usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>