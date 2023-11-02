<?php
function generarVector() {
    $vector = [];
    for ($i = 0; $i < 6; $i++) {
        $vector[] = rand(1, 20);
    }
    return $vector;
}

$origen = generarVector();
$destino = generarVector();

// encontrar elementos repetidos y sus posiciones
function encontrarRepetidos($vector1, $vector2) {
    $repetidos = [];
    for ($i = 0; $i < count($vector1); $i++) {
        $elemento = $vector1[$i];
        if (in_array($elemento, $vector2)) {
            $posicion1 = array_search($elemento, $vector1) + 1;
            $posicion2 = array_search($elemento, $vector2) + 1;
            $repetidos[] = "El elemento $elemento está en la posición $posicion1 de origen y en la posición $posicion2 de destino";
        }
    }
    return $repetidos;
}
?>
