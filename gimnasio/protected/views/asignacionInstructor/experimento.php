<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'grid-id',
        'dataProvider'=>$cliente->search("Cliente", "habilitado"),
        'selectableRows'=>1,
        'columns'=>array(
                array(
                        'class'=>'CCheckBoxColumn',
                        'id'=>'check-boxes',
                        'checked'=>"0",
                ),
                'rut_usuario',
                array(
                    'name'=>'primer_nombre',
                    'value' =>'$data->primer_nombre." ".$data->primer_apellido." ".$data->segundo_apellido',
                    'filter'=>'',
                ),
        ),
)); ?>

<?php
   echo CHtml::ajaxLink('Ingresar', Yii::app()->createUrl('asignacionInstructor/create'),
        array(
           'type'=>'POST',
           'data'=>'js:{ids : $.fn.yiiGridView.getChecked("grid-id","check-boxes")}'
        )

   );
?>