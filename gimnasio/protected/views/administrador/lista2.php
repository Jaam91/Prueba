<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Lista de Clientes',
);
?>

<h2>Lista de Clientes Inscritos</h2>

<p>Seleccione al cliente y presione la opción Siguiente</p>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-pago-grid',
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
            'template'=>'{asistencia}',
            'buttons'=> array(
				"asistencia"=>array(
            			'label' => 'Siguiente',
            			'click'=>'function(){return confirm("¿Está seguro que desea registrar pago de este Cliente?");}',
            			'imageUrl'=>'images/signoPeso.jpg',
            			'url'=>'CHtml::normalizeUrl(array("registrarPago","rut_cliente"=>$data->primarykey))',
                        ),

          		),
        ),
	),
)); ?>
