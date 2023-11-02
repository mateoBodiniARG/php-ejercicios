<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIn.css">
    <title>Nasa Ejercicios - Respuestas</title>
</head>
<body>
    <section class='respuesta'>
        <?php
        require 'index.php';
        function planetaMasPartH($particulas) {
            $max = max($particulas);
            // Encontrar el índice del valor máximo en el arreglo de partículas
            $indice_max = array_search($max, $particulas);
            return obtenerNombre($indice_max);
        }

        function planetaMenosPartH($particulas) {
            $min = min($particulas);
            $indice_min = array_search($min, $particulas);
            return obtenerNombre($indice_min);
        }

        function promedioPartH($particulas) {
            $total = array_sum($particulas);
            $promedioTot = $total / count($particulas);
            return round($promedioTot, 2);
        }

        function obtenerNombre($indice) {
            global $planetas;
            return $planetas[$indice];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $particulas = $_POST["particulas"];

            $planetaMas = planetaMasPartH($particulas);
            $planetaMenos = planetaMenosPartH($particulas);
            $promedio = promedioPartH($particulas);

            echo "<p>El planeta $planetaMas es donde se detectaron más partículas H.</p>";
            echo "<p>El planeta $planetaMenos es donde se detectaron menos partículas H.</p>";
            echo "<p>El promedio de partículas H es $promedio.</p>";
        }
        ?>
    </section>
</body>
</html>
