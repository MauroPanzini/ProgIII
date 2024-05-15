<?php
    /*
    Mauro Panzini - A332-1 LUNES
    Aplicación No 3 (Obtener el valor del medio)
    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
    = 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
    */
    $a =2;
    $b = 1;
    $c = 5;
    $numero_medio = 0;

    if ($a > $b && $a < $c) {
        $numero_medio = $a;
    }
    else if ($a > $c && $a < $b) {
        $numero_medio = $a;
    }
    else if ($b > $a && $b < $c) {
        $numero_medio = $b;
    }
    else if ($b > $c && $b < $a) {
        $numero_medio = $b;
    }
    else if ($c > $a && $c < $b){
        $numero_medio = $c;
    }
    else if ($c > $b && $c < $c){
        $numero_medio = $c;
    }
    else{
        $numero_medio = "No hay numero del medio";
    }
    echo "El numero del medio es: ". $numero_medio ."";
?>