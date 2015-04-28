<?php $this->breadcrumbs=array(
	'Lista de Clientes'=>array('asistencia'),
	'Dependencia',
);
$this->menu=array(
	array('label'=>'Registrar asistencia Cliente Invitado', 'url'=>array('administrador/invitado')),
	
);

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependencia2-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	)
)); ?>
	<h2>Asistencia a una Dependencia</h2>

	<p> Seleccione una Dependencia y presiona la opción Registrar</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Dependencia'); ?>
		<?php echo $form->dropDownList($model,'id_dependencia',CHtml::listData($lista,'id_dependencia', 'id_dependencia'),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'id_dependencia'); ?>
	</div>  

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Save', array('id'=>$rut)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<br><br>
<br><h3>Lista de Actividadas inscritas por el cliente: <?php echo $nombre[0]->primer_nombre?></h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unidad-medica-grid',
	'dataProvider'=>$actividad,
	'columns'=>array(
		array(
			'header'=>'Nombre Actividad',
			'name'=>'nombre_actividad',
			'value'=>'$data->nombre_actividad',
			'filter'=> false,
		),
		array(
			'header'=>'Dependencia',
			'name'=>'id_dependencia',
			'value'=>'$data->actividad0->idDependencia->id_dependencia',
			'filter'=> false,
		),
	),
)); ?>

