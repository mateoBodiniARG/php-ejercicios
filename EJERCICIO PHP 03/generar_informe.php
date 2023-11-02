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
$query = 
"SELECT alumnos.AluNombre, 
COUNT(examenes.ExaFecha) AS veces_rendidas, 
SUM(CASE WHEN examenes.ExaNota >= 7 THEN 1 ELSE 0 END) AS aprobados,
SUM(CASE WHEN examenes.ExaNota >= 7 THEN examenes.ExaNota ELSE 0 END) AS suma_notas_aprobadas 
FROM ALUMNOS 
LEFT JOIN EXAMENES ON alumnos.AluLegajo = examenes.AluLegajo
GROUP BY alumnos.AluNombre";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<h2>Informe</h2>';
    echo '<table>';
    echo '<tr><th>Nombre del Alumno</th><th>Cantidad de veces rendidas</th><th>Cantidad de aprobados</th><th>Promedio de aprobados</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["AluNombre"] . '</td>';
        echo '<td>' . $row["veces_rendidas"] . '</td>';
        echo '<td>' . $row["aprobados"] . '</td>';
        if ($row["aprobados"] > 0) {
            $promedio_aprobados = $row["suma_notas_aprobadas"] / $row["aprobados"];
            echo '<td>' . number_format($promedio_aprobados, 2) . '</td>';
        } else {
            echo '<td></td>'; 
        }
        echo '</tr>';
    }

    // Consulta para obtener el promedio general de aprobados
    $queryPromedioGeneral = "SELECT AVG(examenes.ExaNota) AS promedio_general
    FROM EXAMENES ";

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
