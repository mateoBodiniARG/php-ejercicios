<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Convertir</title>
</head>
<body>
    <h1>Conversión de números</h1>
    <form action="convertir.php" method="post">
      <label for="Numbers">Número en base 10:</label>
      <input type="number" id="numbers" name="numbers">
      <br>
      <label for="Base">Base de conversión:</label>
      <select id="base" name="base">
        <?php
        for ($i = 1; $i <= 9; $i++) {
          echo "<option value='$i'>$i</option>";
        }
        ?>
      </select>
      <br>
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>