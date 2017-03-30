<!DOCTYPE html>
<html>
<head>
	<title>Prueba de PHP</title>
</head>
<body>
	<?php
		$nombre = "Juan";
		$var1 = "$nombre";
		$var2 = '$nombre';
		echo $var1,"\n";
		echo $var2,"\n";
		$cad1 = "- Cadena entre\n\tcomillas dobles - ";
		$cad2 = '- Cadena entre\n\tcomillas simples - ';
		echo $cad1,"\n";
		echo $cad2,"\n";
		$numero = 10;
		$cad1 = "- Hay '$numero' personas en la cola. - ";
		$cad2 = '- Hay "$numero" personas esperando. -';
		echo $cad1,"\n";
		echo $cad2;
		echo "<br>";
	?>

	<?php
		$cad1 = "Hola,";
		$cad2 = ' caracola.';
		$cad3=$cad1.$cad2;
		$cad4=$cad1." ".$cad2;
		echo $cad3." – ".$cad4;
		$cad4 .= " Este texto se añade por detrás a la cadena.";
		echo "<br>";
	?>

	<?php
		$edad=21;
		echo "$edad";
		$precio=343.45;
		$nombre= "Pepe";
		echo "<br>";
		$nombre2 = $nombre;
		print_r($nombre);
		print
		print($precio);
		echo $nombre2;
		$pseudonimo= &$nombre2; // Asignación de una variable por referencia.
	?>

	<?php
		$nombre_de_la_variable="temperatura";
		$$nombre_de_la_variable= 30.5;
		/* Esto implicaría que $temperatura=30.5; */
	?>

	<p> La temperatura es de <?php echo $temperatura; ?> grados. </p>
	<!-- Ó -->
	<?php
	echo "<p>La temperatura es de ", $temperatura," grados. </p>";
	?>
	<!-- Ó -->
	<?php
	echo "<p>La temperatura es de $temperatura grados. </p>";
	?>

	<p>Esto es una línea de HTML.</p>
	<?php
		echo "<p>Y esto una lína de PHP.</p>";
		phpinfo();
	?>
</body>
</html>