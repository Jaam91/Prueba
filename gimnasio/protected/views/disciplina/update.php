<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->nombre=>array('view','id'=>$model->nombre),
	'Update',
);

$this->menu=array(
	array('label'=>'List Disciplina', 'url'=>array('index')),
	array('label'=>'Create Disciplina', 'url'=>array('create')),
	array('label'=>'View Disciplina', 'url'=>array('view', 'id'=>$model->nombre)),
	array('label'=>'Manage Disciplina', 'url'=>array('admin')),
);
?>

<h1>Update Disciplina <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>