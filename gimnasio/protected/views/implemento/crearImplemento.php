<?php
/* @var $this ImplementoController */
/* @var $model Implemento */

$this->breadcrumbs=array(
	'Opciones'=>array('opcionesModulo'),
	'Ingresar',
);

$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearImplemento')),
	array('label'=>'Gestión de Máquinas e Implementos', 'url'=>array('admin')),
);
?>

<h1>Ingresar Máquina e Implemento</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'lista'=>$lista, 'disciplinas'=>$disciplinas, 'grupoMuscular'=>$grupoMuscular)); ?>