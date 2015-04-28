<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Opciones'=>array('ingresa'),
	'Habilitar',
);

$this->menu=array(
	array('label'=>'Ingresar Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
	array('label'=>'Habilitar Actividad', 'url'=>array('lista')),
);
?>

<h2>Habilitar Actividad</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'actividad-grid',
	'dataProvider'=>$model->search("eliminado"),
	'filter'=>$model,
	'columns'=>array(
		#'id_actividad',
		'nombre',
		array(
   			'name'=>'id_disciplina',
   			'value' =>'$data->idDisciplina->nombre',
   			'filter'=>'',
		),
		array(
   			'name'=>'id_dependencia',
   			'value' =>'$data->id_dependencia',
   			'filter'=>false,
		),
		array(
   			'name'=>'rut_instructor',
   			'value' =>'$data->rutUsuario->rutUsuario->primer_nombre." ".$data->rutUsuario->rutUsuario->primer_apellido',
   			'filter'=>'',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=> '{habilitar}',
			'buttons'=>array(
				"habilitar"=>array(					
            	            'label'=>'habilitar', // titulo del enlace del botón nuevo
            	            'click'=>'function(){return confirm("¿Seguro que desea habilitar esta Actividad?");}',
		    				'imageUrl'=>'images/habilitar.png',
           					'url'=>'CHtml::normalizeUrl(array("habilitar","id_actividad"=>$data->primarykey))',
					),
				),
		),
	),
)); ?>
