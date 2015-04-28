<?php
/* @var $this ImplementoController */
/* @var $model Implemento */

$this->breadcrumbs=array(
	'Gestión de Máquinas e Implementos'=>array('admin'),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearImplemento')),
	array('label'=>'Gestión de Máquinas e Implementos', 'url'=>array('admin')),
);
?>

<h3>Modificar Implemento #<?php echo $model->id_implemento; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista'=>$lista, 'disciplinas'=>$disciplinas)); ?>