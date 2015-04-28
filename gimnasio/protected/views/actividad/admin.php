<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->breadcrumbs=array(
	'Opciones'=>array('ingresar'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Ingresar Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
	array('label'=>'Habilitar Actividad', 'url'=>array('lista')),
);
?>

<h2>Gestionar Actividad</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'actividad-grid',
	'dataProvider'=>$model->search('habilitado'),
	'filter'=>$model,
	'columns'=>array(
		#'id_actividad',
		'nombre',
		array(
   			'name'=>'nombre_disciplina',
   			'value' =>'$data->nombre_disciplina',
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
   			'name'=>'cantidad_clientes',
   			'value' =>'$data->cantidad_clientes',
   			'filter'=>'',
		),

		array(
            'class' => 'CButtonColumn',
            'template'=>'{update}{eliminar}',  // mostramos los botones a mostrar
            'buttons'=> array(
				"update"=>array(
            			'label' => 'modificar',
            			'imageUrl'=>'images/modificar.png',
                        ),
				"eliminar"=>array(					
            	            'label'=>'eliminar', // titulo del enlace del botón nuevo
            	            'click'=>'function(){return confirm("¿Está seguro que desea eliminar esta Actividad?");}',
		    				'imageUrl'=>'images/eliminar.png',
           					'url'=>'CHtml::normalizeUrl(array("delete","id"=>$data->primarykey))',       					
						),

          		),
        ),
	),
)); ?>
