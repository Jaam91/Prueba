<?php

$this->breadcrumbs=array(
	'Registro',
);
?>

<h2>¡Registro de Asistencia exitoso!</h2>


<?php if($num == 1):?>
<h2><?php echo $nombre.' asiste a la dependencia '.$id_dependencia?> </h2> 

<?php endif;

if($num==2):?>
<h2><?php echo "Cliente invitado asiste al Gimnasio"?> </h2>
<?php endif;?> 


		<ul class="nav nav-list">
			<br><br>
  			<li class="">
  	  			<td> <?php echo CHtml::link('Registrar nueva asistencia',array('asistencia'));?></td>
  			</li>
		</ul>

