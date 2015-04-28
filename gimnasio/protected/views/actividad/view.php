<?php
/* @var $this ActividadController */
/* @var $model Actividad */

$this->menu=array(
	array('label'=>'Ingresar Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
	array('label'=>'Habilitar Actividad', 'url'=>array('lista')),
);



if($numero == 1): 
			$this->breadcrumbs=array(
			'Opciones'=>array('ingresar'),
			'Ingresar'=>array('create'),
			'Registro',
		);?>
		<h1>¡Actividad ingresada con éxito!</h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id_actividad',
				'nombre',
				'id_disciplina',
				'id_dependencia',
				'rut_instuctor',
			),
		)); ?>
		<ul class="nav nav-list">
			<br><br>
  			<li class="">
  	  			<td> <?php echo CHtml::link('Volver',array('create'));?></td>
  			</li>
		</ul>
<?php endif;

if($numero == 2): 
			$this->breadcrumbs=array(
			'Opciones'=>array('ingresar'),
			'Gestionar'=>array('admin'),
			'Registro',
		);?>
	<h1>¡Actividad modificada con éxito!</h1>
			<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id_actividad',
				'nombre',
				'id_disciplina',
				'id_dependencia',
				'rut_instuctor',
				),
			)); ?>

		<ul class="nav nav-list">
			<br><br>
  			<li class="">
  			
  	  			<td> <?php echo CHtml::link('Volver',array('admin'));?></td>
  			</li>
		</ul>

<?php endif; ?>