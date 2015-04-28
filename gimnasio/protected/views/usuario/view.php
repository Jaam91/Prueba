<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Ingresar Cliente'=>array('crearCliente'),
	"Registro",
);

if($tipo == 1): 
		$this->menu=array(
			array('label'=>'Ingresar Personal', 'url'=>array('crearPersonal')),
			array('label'=>'Gestión del Personal', 'url'=>array('administrador/admin')),
			array('label'=>'Habilitar Personal', 'url'=>array('administrador/lista')),
			); ?>
		<h1>¡Usuario ingresado con éxito!</h1> <?php endif;
if($tipo == 2):
		$this->menu=array(
			array('label'=>'Ingresar Cliente', 'url'=>array('crearCliente')),
			array('label'=>'Gestión de Clientes', 'url'=>array('cliente/admin')),
			array('label'=>'Habilitar Cliente', 'url'=>array('cliente/lista')),
			); ?>
		<h1>¡Cliente ingresado con éxito!</h1> <?php endif;

		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'rut_usuario',
				'primer_nombre',
				'segundo_nombre',
				'primer_apellido',
				'segundo_apellido',
				'rol',
			),
			)); ?>
		<?php if($tipo == 1): ?>
				<br><br>
				<ul class="nav nav-list">
		  			<li class="">
		  	  			<td> <?php echo CHtml::link('Volver',array('crearPersonal'));?></td>
		  			</li>
				</ul>
		<?php endif;
		      if($tipo == 2): ?>
		      	<br><br>
				<ul class="nav nav-list">
		  			<li class="">
		  	  			<td> <?php echo CHtml::link('Volver',array('crearCliente'));?></td>
		  			</li>
				</ul>
		<?php endif; ?>