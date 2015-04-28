<?php
/* @var $this ImplementoController */
/* @var $model Implemento */



$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearImplemento')),
	//array('label'=>'Update Implemento', 'url'=>array('update', 'id'=>$model->id_implemento)),
	//array('label'=>'Delete Implemento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_implemento),'confirm'=>'¿Está seguro que desea eliminar este Implemento?')),
	array('label'=>'Gestión de Implementos', 'url'=>array('admin')),
);
?>




<?php
	if($valor == 1)
	{
		$this->breadcrumbs=array(
		'Opciones'=>array('opcionesModulo'),
		'Gestión de Implementos'=>array('admin'),
		'Resultado Modificación',
		);
		echo "<h3>"."¡El Implemento #$model->id_implemento se ha modificado exitosamente!"."</h3>";
	}else{
		$this->breadcrumbs=array(
		'Opciones'=>array('opcionesModulo'),
		'Ingresar'=>array('crearImplemento'),
		'Resultado Ingreso',
		);
		echo "<h3>"."¡El Implemento #$model->id_implemento se ha ingresado exitosamente!"."</h3>";
	}

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_implemento',
		'id_dependencia',
		'tipo',
		'ano',
		'grupo_muscular',
		'estado_funcional',
		'estado',
	),
)); ?>
