<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Telefonia</title>
</head>
<body>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "telefonia";
$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para encontrar al titular que más consumió en términos de Datos
$sqlDatos = "SELECT titulares.nomtit, SUM(consumos.cancon) AS total_datos
            FROM titulares
            INNER JOIN consumos ON titulares.numlin = consumos.numlin
            WHERE consumos.concon = 'D'
            GROUP BY titulares.numlin
            ORDER BY total_datos DESC
            LIMIT 1";

$resultadoDatos = $conexion->query($sqlDatos);
$filaDatos = $resultadoDatos->fetch_assoc();

// Consulta para encontrar al titular que más consumió en términos de Telefonía
$sqlTelefonia = "SELECT titulares.nomtit, SUM(consumos.cancon) AS total_telefonia
                FROM titulares
                INNER JOIN consumos ON titulares.numlin = consumos.numlin
                WHERE consumos.concon = 'T'
                GROUP BY titulares.numlin
                ORDER BY total_telefonia DESC
                LIMIT 1";

$resultTelefonia = $conexion->query($sqlTelefonia);
$filaTelefonia = $resultTelefonia->fetch_assoc();

// Consulta para encontrar al titular que más consumió en general
$sqlGeneral = "SELECT titulares.nomtit, SUM(consumos.cancon) AS total_general
              FROM titulares
              INNER JOIN consumos ON titulares.numlin = consumos.numlin
              GROUP BY titulares.numlin
              ORDER BY total_general DESC
              LIMIT 1";

$resultGeneral = $conexion->query($sqlGeneral);
$filaGeneral = $resultGeneral->fetch_assoc();

// Mostrar los resultados
echo "<div class='resultados'>";
echo "" . $filaDatos['nomtit'] . " fue quien más consumió, en $, en <b>datos</b>." . "<br>";
echo "" . $filaTelefonia['nomtit'] . " fue quien más consumió, en $, en <b>telefonía</b>." . "<br>";
echo "" . $filaGeneral['nomtit'] . " fue quien más consumió, en $, en <b>general</b>." . "<br>";
echo "</div>";

$conexion->close();
?>    
</body>
</html>