<?php
/*
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->id_dependencia=>array('view','id'=>$model->id_dependencia),
	'Update',
);
*/

$this->breadcrumbs=array(
	'Gestión de dependencias'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearDependencia')),
	array('label'=>'Gestión de Dependencias', 'url'=>array('admin')),
);
?>

<h3>Modificar Dependencia <?php echo $model->id_dependencia; ?></h3>

<?php $this->renderPartial('formModificar', array('model'=>$model)); ?>