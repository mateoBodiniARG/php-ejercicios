<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Número</th>
            <th>Seno</th>
            <th>Coseno</th>
        </tr>
        <?php
        for ($x = 0; $x <= 2; $x += 0.01) {
            $sen = sin($x);
            $cos = cos($x);
            $color_coseno = ($cos >= 0) ? 'positivo' : 'negativo';
            $color_seno = ($sen >= 0) ? 'positivo' : 'negativo';
            echo "<tr>";
            echo "<td>$x</td>";
            echo "<td class='$color_seno'>$sen</td>";
            echo "<td class='$color_coseno'>$cos</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
