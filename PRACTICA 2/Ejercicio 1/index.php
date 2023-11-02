<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleBuscar.css">
    <title>Elementos Repetidos</title>
</head>
<body>
    <div class="container">
        <h1>PRACTICA 2 EJ1</h1>
        <h2>Números generados:</h2>
        <div class='result'>
            <?php
        require 'buscarRepeticiones.php';
        
        //convertir a cadena de texto y separarlos por coma
        echo "Origen: " . implode(", ", $origen) . "<br>";
        echo "Destino: " . implode(", ", $destino) ;
        ?>
        </div>   

        <h2>Elementos repetidos:</h2> 
        <?php
        $elementosRepetidos = encontrarRepetidos($origen, $destino);
        $repeticiones = count($elementosRepetidos);

        foreach ($elementosRepetidos as $repetido) {
            echo $repetido . "<br>";
        }
        echo "Se encontraron $repeticiones repeticiones.";
        ?>
    </div>
</body>
</html>
