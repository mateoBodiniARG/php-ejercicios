<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "colegio";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener el informe
$query = "SELECT alumnos.AluNombre, COUNT(examenes.ExaFecha) AS veces_rendidas, 
COUNT(CASE WHEN examenes.ExaNota >= 7 THEN 1 ELSE NULL END) AS aprobados,
AVG(examenes.ExaNota) AS promedio
FROM ALUMNOS 
INNER JOIN EXAMENES ON alumnos.AluLegajo = examenes.AluLegajo
GROUP BY alumnos.AluNombre";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<h2>Informe</h2>';
    echo '<table>';
    echo '<tr><th>Nombre del Alumno</th><th>Cantidad de veces rendidas</th><th>Cantidad de aprobados</th><th>Promedio</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["AluNombre"] . '</td>';
        echo '<td>' . $row["veces_rendidas"] . '</td>';
        echo '<td>' . $row["aprobados"] . '</td>';
        echo '<td>' . number_format($row["promedio"], 2) . '</td>';
        echo '</tr>';
    }

    // Consulta para obtener el promedio general de aprobados
    $queryPromedioGeneral = "SELECT AVG(examenes.ExaNota) AS promedio_general
    FROM EXAMENES
    WHERE examenes.ExaNota >= 7";

    $resultPromedioGeneral = $conn->query($queryPromedioGeneral);

    if ($rowPromedioGeneral = $resultPromedioGeneral->fetch_assoc()) {
        echo '<tr><td colspan="4"><b>Promedio General de Aprobados:</b> '  . number_format($rowPromedioGeneral["promedio_general"], 2) . '</td></tr>';
    }

    echo '<tr><td colspan="4"><b>Total de Alumnos:</b> ' . $result->num_rows . '</td></tr>';
    echo '</table>';
} else {
    echo "No se encontraron registros.";
}

$conn->close();
?>

</body>
</html>
