<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */





$this->menu=array(
	array('label'=>'Ingresar', 'url'=>array('crearDependencia')),
	//array('label'=>'Delete Dependencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dependencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestión de Dependencias', 'url'=>array('admin')),
);
?>



<?php

  if($valor == 1)
  {
  		$this->breadcrumbs=array(
		'Opciones'=>array('opcionesModulo'),
		'Gestion de dependencia'=>array('admin'),
		'Resultado Modificación',
		);
  	   echo "<h3>¡La dependencia <?php echo $model->id_dependencia; ?> se ha modificado exitosamente!</h3>";

  }else{
  		$this->breadcrumbs=array(
		'Opciones'=>array('opcionesModulo'),
		'Ingresar'=>array('crearDependencia'),
		'Resultado Ingreso',

		);
  	  echo "<h3>¡La dependencia <?php echo $model->id_dependencia; ?> se ha ingresado exitosamente!</h3>";
  }
	

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_dependencia',
		'metros_cuadrados',
	),
)); ?>

<html>

<ul class="nav nav-list">
</br>
	  <li class="">
   			 <td> <?php echo CHtml::link('Volver a opciones',array('dependencia/opcionesModulo'));?></td> 
	  </li>
	</ul>

</html>
