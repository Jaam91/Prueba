<?php
/* @var $this ActividadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opciones',
);
?>

<h2>Opciones</h2>


<ul class="nav nav-list">

  <li class="">
    <td> <?php echo CHtml::link('Ingresar Actividad',array('actividad/create'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Gestionar Actividad',array('actividad/admin'));?></td> 
  </li>
   <li>
    <td> <?php echo CHtml::link('Habilitar Actividad',array('actividad/lista'));?></td> 
  </li>
</ul>