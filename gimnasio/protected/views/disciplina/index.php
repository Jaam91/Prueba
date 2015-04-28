<?php
/* @var $this DisciplinaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Disciplinas',
);

$this->menu=array(
	array('label'=>'Create Disciplina', 'url'=>array('create')),
	array('label'=>'Manage Disciplina', 'url'=>array('admin')),
);
?>

<h1>Disciplinas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
