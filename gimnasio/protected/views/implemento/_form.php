<?php
/* @var $this ImplementoController */
/* @var $model Implemento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'implemento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>   
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/implemento.js', CClientScript::POS_END);?>

	<?php
    Yii::app()->getClientScript()->registerScript('otro_grupo_muscular',CClientScript::POS_END);
 	?>

	<div id= "depen" class="row">
		<?php echo $form->labelEx($model,'Dependencia'); ?>
		<?php echo $form->dropDownList($model,'id_dependencia',CHtml::listData($lista,'id_dependencia','id_dependencia'),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'id_dependencia'); ?>
	</div>

	<div id="tipo" class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->dropDownList($model,'tipo',CHtml::listData($disciplinas,'nombre','nombre'),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	
	<div id="año" class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>

	<div id="grupo_muscular" class="row">
		<?php echo $form->labelEx($model,'grupo_muscular'); ?>
		<?php echo $form->dropDownList($model,'grupo_muscular',CHtml::listData($grupoMuscular,'nombre','nombre'),array('empty'=>'Seleccione')); ?>
		<?php echo $form->error($model,'grupo_muscular'); ?>
	</div>

	<div id="otro" class="row">
		<?php echo $form->labelEx($model,'agregar grupo_muscular'); ?>
		<?php echo $form->textField($model,'grupo_muscular',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'grupo_muscular'); ?>
	</div>

	<div id="estado_funcional" class="row">
		<?php echo $form->labelEx($model,'estado_funcional'); ?>
		<?php echo $form->textField($model,'estado_funcional',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'estado_funcional'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->