<?php $this->breadcrumbs=array(
	'Seleccionar Cliente'=>array('create'),
	'Ingresar',
);
?>


<h2>Asignación de Personal Trainer</h2>
<p> Seleccione un Personal Trainer y presione la opción Asignar</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'asignacion-instructor-grid',
	'dataProvider'=>$model->search2("habilitado", "Personal Trainer"),
	'filter'=>$model,
	'columns'=>array(
		'rut_usuario',
		array(
   			'name'=>'primer_nombre',
   			'value' =>'$data->primer_nombre." ".$data->primer_apellido." ".$data->segundo_apellido',
   			'filter'=>'',
		),
		array(
   			'name'=>'tipo',  // sobreescribir el atributo rol
   			'value' =>'$data->instructor->tipo',
   			'filter'=>'',
		),
		array(
   			'name'=>'horario',  // sobreescribir el atributo estado
   			'value' =>'$data->instructor->horario',
   			'filter'=>'',
		),

		array(
            'class' => 'CButtonColumn',
            'template'=>'{asignar}',
            'buttons'=> array(
				"asignar"=>array(
            	            'label'=>'asignar', // titulo del enlace del botón nuevo
		    				'imageUrl'=>'images/asignar.png',
            			),

          		),
        ),
	),
)); ?>
