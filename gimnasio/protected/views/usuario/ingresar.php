<?php
/* @var $this AdministradorController */
/* @var $model Administrador */

$this->breadcrumbs=array(
	'Opciones',
);
?>

<h2>Opciones</h2>
<ul class="nav nav-list">

  <li class="">
    <td> <?php echo CHtml::link('Ingresar Personal',array('usuario/crearPersonal'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Ingresar Cliente',array('usuario/crearCliente'));?></td> <br><br>
  </li>
   <li>
    <td> <?php echo CHtml::link('Gestión del Personal',array('administrador/admin'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Gestión de Clientes',array('cliente/admin'));?></td> <br><br>
  </li>

  <li>
    <td> <?php echo CHtml::link('Habilitar Personal',array('administrador/lista'));?></td> 
  </li>
  <li>
    <td> <?php echo CHtml::link('Habilitar Cliente',array('cliente/lista'));?></td> 
  </li>
</ul>