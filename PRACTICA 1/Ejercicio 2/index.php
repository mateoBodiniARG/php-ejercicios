<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIn.css">
    <title>Nasa ejercicios</title>
</head>
<body>
    <div class="container">
        <h1>Proyecto NASA - Partículas H</h1>
        <form action="procesarPart.php" method="POST" class="form">
            <?php
            $planetas = [
                'Mercurio', 'Venus', 'Tierra', 'Marte', 'Júpiter', 'Saturno', 'Urano', 'Neptuno', 'Plutón'
            ];          
            for ($i = 0; $i < count($planetas); $i++) {
                echo '<label for="' . $planetas[$i] . '">' . $planetas[$i] . ':</label>';
                echo '<input type="number" name="particulas[' . $i . ']" required><br>';
            }
            ?>
            <button type="submit">Calcular</button>
        </form>
    </div>
</body>
</html>
