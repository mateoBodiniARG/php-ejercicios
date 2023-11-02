<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleRes.css">
    <title>Document</title>
</head>
<body>
    <section class="mostrarRes">
    <?php
    if (isset($_POST["generar"])) {
        // Genera un arreglo con 30 notas al azar entre 0 y 10
        $notas_alumnos = [];
        for ($i = 0; $i < 30; $i++) {
            $nota = rand(0, 10);
            array_push($notas_alumnos, $nota);
        }
        // Imprime todas las notas 
        echo "<h2>Todas las notas:</h2>";
        echo implode(", ", $notas_alumnos) . "<br>";

        // Función para encontrar las 3 mejores notas
        function Abanderado($notas) {
            // Ordena el arreglo de notas de mayor a menor
            arsort($notas);
=>
            // Devuelve las 3 primeras notas (las mejores)
            return array_slice($notas, 0, 3);
        }

        // Llama a la función Abanderado para obtener las 3 mejores notas
        $mejores_notas = Abanderado($notas_alumnos);
        // Imprime las 3 mejores notas
        echo "<h2>Las 3 mejores notas son:</h2>";
        echo implode(", ", $mejores_notas) . "<br>";
    }
    ?>
    </section>
</body>
</html>
