<!DOCTYPE html>
<html>
<head>
	<title>Prueba de PHP 2</title>
</head>
<body>
<?php
	$nombre_del_vector['clave1'] = 1;
	$nombre_del_vector['clave2'] = 2;
	$nombre_del_vector['clave3'] = 3;

	$capitales[] = "Madrid";
	$capitales[] = "Londres";
	$capitales2 = array("Londres","Madrid","Berlín");
	$capitale3 = array(12 >="Londres","Madrid","Berlín");
	$capitales4 = array ( "SP" => "Spain","UK "=> "Reino Unido" , "USA"=> "Salem" );

	$anios = range(2001, 2010);
	$letras=range("z", "a");

	echo "<pre>";
	var_dump($anios);
	echo "</pre>";
?>
</body>
</html>