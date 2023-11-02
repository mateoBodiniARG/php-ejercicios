<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>resultados</title>
</head>
<body>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "empleado_trabajo";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el número de empleado ingresado por el usuario
    $numeroEmpleado = $_POST['numeroEmpleado'];

    // Verificar si el empleado ya ha sido actualizado
    $query = "SELECT Nombre, ValorHora, Actualizado FROM EMPLEADO WHERE NumeroEmpleado = $numeroEmpleado";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["Actualizado"] === "SI") {
            header("Location: index.html"); 
            exit();
        } else {
            // Se calcula la cantidad total de horas trabajadas, el importe neto cobrado y mostrar los resultados junto con el nombre del empleado
            $consultaHoras = "SELECT SUM(CantidadHorasTrabajadas) AS TotalHoras FROM TRABAJO WHERE NumeroEmpleado = $numeroEmpleado";
            $resultadoHoras = $conn->query($consultaHoras);
            if ($resultadoHoras->num_rows > 0) {
                $rowHoras = $resultadoHoras->fetch_assoc();
                $totalHoras = $rowHoras["TotalHoras"];
                $importeNeto = $totalHoras * $row["ValorHora"];
                echo '<div class="result-container">';
                echo '<p class="result-title">Nombre del empleado: ' . $row["Nombre"] . '</p>';
                echo '<p class="result-title">Cantidad total de horas trabajadas: ' . $totalHoras . '</p>';
                echo '<p class="result-title">Importe neto cobrado: $' . $importeNeto . '</p>';
                echo '</div>';

                // Actualizar el campo "Actualizado" a "SI"
                $actualizarCampo = "UPDATE EMPLEADO SET Actualizado = 'SI' WHERE NumeroEmpleado = $numeroEmpleado";
                $conn->query($actualizarCampo);
            }
        }
    } else {
        echo "No se encontró el empleado.";
    }
}

$conn->close();
?>
</body>
</html>