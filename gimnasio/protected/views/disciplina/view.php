<?php
/* @var $this DisciplinaController */
/* @var $model Disciplina */

$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'List Disciplina', 'url'=>array('index')),
	array('label'=>'Create Disciplina', 'url'=>array('create')),
	array('label'=>'Update Disciplina', 'url'=>array('update', 'id'=>$model->nombre)),
	array('label'=>'Delete Disciplina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nombre),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Disciplina', 'url'=>array('admin')),
);
?>

<h1>View Disciplina #<?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'valor_mensualidad',
		'estado',
	),
)); ?>
