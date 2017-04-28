<?php
  $servername = "localhost";
  $databasename = "pw_76655977";
  $username = "pw_76655977";
  $password = "3372hot";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

  $consultaSQL = "SELECT * FROM libros";
  $resultados = $conexion­>query( $consultaSQL );
  foreach ( $resultados as $fila ) {
    echo "ISBN = " . $fila["isbn"] . "<br />";
    echo "Título = " . $fila["titulo"] . "<br />";
  }

  $conn = null;
?>
