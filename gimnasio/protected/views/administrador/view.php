<?php

$this->breadcrumbs=array(
	'Lista de Clientes'=>array('pago'),
	'Registro',
);
?>

<h2>¡Registro de Pago Exitoso!</h2>

<h2><?php echo $nombre.' pagó la siguiente disciplina '.$nombre_d?> </h2> 

		<ul class="nav nav-list">
			<br><br>
  			<li class="">
  	  			<td> <?php echo CHtml::link('Registrar nuevo pago',array('pago'));?></td>
  			</li>
		</ul>

