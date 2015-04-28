<?php

$this->breadcrumbs=array(
	'Gestion de dependencias'=>array('admin'),
	'Resultado eliminación',
);
?>

<html>
<head>

<h2>Error en Eliminación de la dependencia</h2>

</head>
<body>
	<br><br>	
	<div style="text-align: left"><b>Dependencia <?php echo $id ?> no puede ser eliminada porque:</b></br></br>

	
	<?php
		if($resultado != NULL AND $cantidad != 0)
		{
			echo "<li>"."<div style='text-align: left'>".'Actualmente se realizan las siguienes actividades.'."</li>";

	 		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'actividad-grid',
			'dataProvider'=>$modelAct->searchClientes(0, $id),
			'filter'=>$modelAct,
			'columns'=>array(
				array(
   					'name'=>'nombre',
   					'value' =>'$data->nombre',
   					'filter'=>'',
				),
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
			),
		));
	}?>

	<?php
		if($implementos != NULL)
		{
			echo "<li>"."<div style='text-align: left'>".'Actualmente se encuentran los siguientes implementos.'."</li>";

			$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'implemento-grid',
			'dataProvider'=>$modelImp->search($id),
			'filter'=>$modelImp,
			'columns'=>array(
				array('name'=>'id_implemento',
					  'value'=>'$data->id_implemento',
					  'filter'=>false,
				),
				array('name'=>'tipo',
					  'value'=>'$data->tipo',
					  'filter'=>false,
				),
				array('name'=>'ano',
					  'value'=>'$data->ano',
					  'filter'=>false,
				),
				array('name'=>'grupo_muscular',
					  'value'=>'$data->grupo_muscular',
					  'filter'=>false,
				),
				array('name'=>'estado',
					  'value'=>'$data->estado',
					  'filter'=>false,
				),
			),
		));
		}
	?>

	<ul class="nav nav-list">
	  <li class="">
   			 <td> <?php echo CHtml::link('Volver',array('dependencia/admin'));?></td> 
	  </li>
	</ul>	
</body>
</html>
