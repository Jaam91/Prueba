<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */

$this->breadcrumbs=array(
	'Opciones'=>array('opcionesModulo'),
	'Gestión de Dependencias',
);

$this->menu=array(
	
	array('label'=>'Ingresar', 'url'=>array('crearDependencia')),
	array('label'=>'Gestión de Dependencias', 'url'=>array('admin')),
);
?>

<h2>Gestión de Dependencias</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dependencia-grid',
	'dataProvider'=>$model->search('habilitado'),
	'filter'=>$model,
	'columns'=>array(
		'id_dependencia',
		'metros_cuadrados',
		#'nombre',
		array(
            'class' => 'CButtonColumn',
            'template'=>'{update}{eliminar}',
            'buttons'=> array(
				"update"=>array(
            			'label' => 'modificar',
            			'imageUrl'=>'images/modificar.png',
            			'visible' => '$data->id_dependencia != "*Gimnasio Central"', 
                        ),
				"eliminar"=>array(					
            	            'label'=>'eliminar', // titulo del enlace del botón nuevo
            	            'click'=>'function(){return confirm("¿Está seguro que desea eliminar esta Dependencia?");}',
		    				'imageUrl'=>'images/eliminar.png',
           					'url'=>'CHtml::normalizeUrl(array("delete","id"=>$data->primarykey))',
           					'visible' => '$data->id_dependencia != "*Gimnasio Central"',           					
						),

          		),
        ),
	),
)); ?>
