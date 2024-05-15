<?php
    /*
    Aplicación No 2 (Mostrar fecha y estación)
    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.
    */ 
    // $timezone = date_default_timezone_set("America/Argentina/Buenos_Aires");
    // $current_date = time();
    // $spring = strtotime('2024-09-22');
    // $summer = strtotime('2024-12-21');
    // $fall = strtotime('2024-03-20');
    // $winter = strtotime('2024-06-20');
    
    // switch (true) {
    //     case $current_date >= $spring && $current_date < $summer:
    //         $current_season = "Primavera";
    //         break;
    //     case $current_date >= $summer && $current_date < $fall:
    //         $current_season = "Verano";
    //         break;
    //     case $current_date >= $fall && $current_date < $winter:
    //         $current_season = "Otoño";
    //         break;
    //     default:
    //         $current_season = "Invierno";
    // }
    
    // echo "Estamos en la fecha: " . date("d/m/Y", $current_date) . "<br/>";
    // echo "Estamos en la estacion: " . $current_season . "<br/>";
    // echo "----------------<br/>";
    // echo "Estamos en la fecha: " . date("m/d/Y", $current_date) . "<br/>";
    // echo "----------------<br/>";
    // echo "Estamos en la fecha: " . date("Y/m/d", $current_date) . "<br/>";
    // echo "----------------<br/>";
    $timezone = new DateTimeZone("America/Argentina/Buenos_Aires");
    $current_date = new DateTime("now", $timezone);
    $spring = new DateTime("2024-09-22", $timezone);
    $summer = new DateTime("2024-12-21", $timezone);
    $fall = new DateTime("2024-03-20", $timezone);
    $winter = new DateTime("2024-06-20", $timezone);

    switch (true) {
        case $current_date >= $spring && $current_date < $summer:
            $current_season = "Primavera";
            break;
        case $current_date >= $summer && $current_date < $fall:
            $current_season = "Verano";
            break;
        case $current_date >= $fall && $current_date < $winter:
            $current_season = "Otoño";
            break;
        default:
            $current_season = "Invierno";
    }

    echo "Estamos en la fecha: " . $current_date->format("d/m/Y") . "<br/>";
    echo "Estamos en la estacion: " . $current_season . "<br/>";
    echo "----------------<br/>";
    echo "Estamos en la fecha: " . $current_date->format("m/d/Y") . "<br/>";
    echo "----------------<br/>";
    echo "Estamos en la fecha: " . $current_date->format("Y/m/d") . "<br/>";
?>