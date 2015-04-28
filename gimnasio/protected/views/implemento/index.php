<?php
/* @var $this ImplementoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Implementos',
);

$this->menu=array(
	array('label'=>'Create Implemento', 'url'=>array('create')),
	array('label'=>'Manage Implemento', 'url'=>array('admin')),
);
?>

<h1>Implementos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
