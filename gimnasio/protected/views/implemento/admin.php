<?php
/* @var $this ImplementoController */
/* @var $model Implemento */

$this->breadcrumbs=array(
	'Opciones'=>array('opcionesModulo'),
	'Gestión de Máquinas e Implementos',
);

$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearImplemento')),
	array('label'=>'Gestión de Máquinas e Implementos', 'url'=>array('admin')),
);
?>

<h2>Gestión de Máquinas e Implementos</h2>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'implemento-grid',
	'dataProvider'=>$model->searchImplemento('habilitado'),
	'filter'=>$model,
	'columns'=>array(
		'id_implemento',
		'id_dependencia',
		'tipo',
		'ano',
		'grupo_muscular',
		'estado_funcional',
		array(
            'class' => 'CButtonColumn',
            'template'=>'{update}{eliminar}',
            'buttons'=> array(
				"update"=>array(
            			'label' => 'modificar',
            			'imageUrl'=>'images/modificar.png',
                        ),
				"eliminar"=>array(					
            	            'label'=>'eliminar', // titulo del enlace del botón nuevo
            	            'click'=>'function(){return confirm("¿Está seguro que desea eliminar este Implemento?");}',
		    				'imageUrl'=>'images/eliminar.png',
           					'url'=>'CHtml::normalizeUrl(array("delete","id"=>$data->primarykey))', 

						),

          		),
        ),
	),
)); ?>
