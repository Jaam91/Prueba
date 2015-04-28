<?php
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$cliente->search("Cliente","habilitado"),
	'filter'=>$cliente,
	'selectableRows' => 2,
	'columns'=>array(
		'rut_usuario',
		array(
   			'name'=>'primer_nombre',
   			'value' =>'$data->primer_nombre." ".$data->primer_apellido." ".$data->segundo_apellido',
   			'filter'=>'',
		),	
		#'profesion',
		#'fecha_ingreso',
		#'curriculum_vitae',
		array(
            'class' => 'CButtonColumn',
            'template'=>'{asignar}',
            'buttons'=> array(
				"asignar"=>array(
            	            'label'=>'Seleccionar', // titulo del enlace del botón nuevo
		    				'imageUrl'=>'images/asignar.png',
            			),

          		),
        ),
	),
)); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asignacion-instructor-form',
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

	<?php echo $form->errorSummary($model); ?>
<br>

	<div class="row">
		<?php echo $form->labelEx($model,'Disciplina'); ?>
		<?php echo $form->dropDownList($model,'disciplina',CHtml::listData($tipo, 'nombre', 'nombre'), array('empty'=>'Seleccione')); ?> 
		<?php echo $form->error($model,'disciplina'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Siguiente' : 'Save', array("class"=>"btn btn-primary")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->