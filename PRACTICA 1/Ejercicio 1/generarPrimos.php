<?php
// Verificarsi es primo
function esPrimo($num) {
    // Verifica si el número es menor o igual a 1 
    if ($num <= 1) {
        return false; // Si es <= 1, no es primo y devuelve false
    }   
    // Bucle que verifica la divisibilidad del número
    for ($i = 2; $i * $i <= $num; $i++) {
        // Comprueba si el número es divisible por $i
        if ($num % $i == 0) {
            return false; // Si es divisible, no es primo y devuelve false
        }
    }
    
    // Si no se encontraron divisores, el número es primo y devuelve true
    return true;
}

// Verifica si la solicitud HTTP es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el valor entero N del formulario HTML
    $n = intval($_POST["numero"]);
    // Inicializa un arreglo para almacenar números primos
    $primos = [];
    // Inicializa una variable para verificar los números primos a partir de 2
    $i = 2;
    // Comienza un bucle para encontrar los primeros N números primos
    while (count($primos) < $n) {
        // Si la función esPrimo($i) devuelve true, significa que $i es primo
        if (esPrimo($i)) {
            // Agrega el número primo al arreglo de primos
            $primos[] = $i;
        }
        
        // Incrementa $i para verificar el siguiente número
        $i++;
    }   
    // Convierte el arreglo de primos en formato JSON y lo imprime
    echo json_encode($primos);
}
?>
