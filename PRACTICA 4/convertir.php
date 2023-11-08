<?php

// Recibir datos del formulario
$numeros = $_POST['numbers'];
$base = $_POST['base'];

// Función de conversión
function convertir($x, $base) {
  return base_convert($x, 10, $base);
}

// Calcular y mostrar el resultado
$convertirNumero = convertir($numero, $base);
echo "$numero en base 10 = $convertirNumero en base $base";

?>
