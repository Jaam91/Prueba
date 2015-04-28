<?php

$this->breadcrumbs=array(
	'Opciones',
);
?>

<h3>Opciones:</h3>
<ul class="nav nav-list">

  <li class="">
    <td> <?php echo CHtml::link('Ingresar Dependencia',array('dependencia/crearDependencia'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Gestión de Dependencias',array('dependencia/admin'));?></td> <br><br>
  </li>
</ul>