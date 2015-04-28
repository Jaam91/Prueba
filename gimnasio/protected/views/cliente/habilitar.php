<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Opciones'=>array('usuario/ingresar'),
	'Habilitar',
);

$this->menu=array(
	array('label'=>'Ingresar Cliente', 'url'=>array('usuario/crearCliente')),
	array('label'=>'Gestión de Clientes', 'url'=>array('admin')),
	array('label'=>'Habilitar Cliente', 'url'=>array('lista')),
);
?>

<h2>Habilitar Cliente</h2>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search("Cliente","eliminado",""),
	'filter'=>$model,
	'columns'=>array(
		'rut_usuario',
		array(
   			'name'=>'primer_nombre',
   			'value' =>'$data->primer_nombre." ".$data->primer_apellido',
   			'filter'=>'',
		),
		array(
   			'name'=>'rol',
   			'value' =>'$data->rol',
   			'filter'=>false,
		),
		#'profesion',
		#'fecha_ingreso',
		#'curriculum_vitae',
		array(
			'class'=>'CButtonColumn',
			'template'=> '{habilitar}',
			'buttons'=>array(
				"habilitar"=>array(					
            	            'label'=>'habilitar', // titulo del enlace del botón nuevo
            	            'click'=>'function(){return confirm("¿Seguro que desea habilitar este Usuario?");}',
		    				'imageUrl'=>'images/habilitar.png',
           					'url'=>'CHtml::normalizeUrl(array("habilitar","rut"=>$data->primarykey))',
					),
				),
		),
	),
)); ?>
