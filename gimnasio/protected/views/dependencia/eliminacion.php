<html>
<head>

<?php

$this->breadcrumbs=array(
	'Gestion de dependencias'=>array('admin'),
	'Resultado eliminación',
);
?>

<h2>Éxito en la eliminación de la dependencia</h2>

</head>
<body>
	<br><br>	
	<div style="text-align: left"><b>¡La dependencia <?php echo $id ?> se ha eliminado exitosamente!</b> </br></br>

	

	<ul class="nav nav-list">
	  <li class="">
   			 <td> <?php echo CHtml::link('Volver',array('dependencia/admin'));?></td> 
	  </li>
	</ul>	
</body>
</html>