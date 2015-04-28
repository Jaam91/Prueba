<?php

$this->breadcrumbs=array(
	'Opciones',
);
?>

<h2>Opciones</h2>
<ul class="nav nav-list">

  <li class="">
    <td> <?php echo CHtml::link('Ingresar Máquina e Implemento',array('implemento/crearImplemento'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Gestión de Máquinas e Implementos',array('implemento/admin'));?></td> <br><br>
  </li>
</ul>