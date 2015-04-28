<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Opciones'=>array('usuario/ingresar'),
	'Gestionar',
);


$this->menu=array(
	array('label'=>'Ingresar Cliente', 'url'=>array('usuario/crearCliente')),
	array('label'=>'Gestión de Clientes', 'url'=>array('admin')),
	array('label'=>'Habilitar Cliente', 'url'=>array('lista')),
	
);
?>

<h2>Administrar Clientes</h2>

<h3><p>Cuentas de usuario de Clientes en el sistema</p></h3>
<p>Edite o elimine las cuentas fácilmente con los iconos al costado derecho en la tabla</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search("Cliente","habilitado"),
	'filter'=>$model,
	'columns'=>array(
		'rut_usuario',
		array(
   			'name'=>'primer_nombre',
   			'value' =>'$data->primer_nombre." ".$data->primer_apellido',
   			'filter'=>'',
		),
		#'telefono_emergencia',
		#'peso',
		#'altura',
		#'enfermedades_previas',
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
            	            'click'=>'function(){return confirm("¿Está seguro que desea eliminar este Cliente?");}',
		    				'imageUrl'=>'images/eliminar.png',
           					'url'=>'CHtml::normalizeUrl(array("delete","id"=>$data->primarykey))',        					
						),

          		),
        ),
	),
)); ?>
