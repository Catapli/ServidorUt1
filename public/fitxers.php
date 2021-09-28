<?php

$arxiu = fopen("plantilla.csv","r");
$lista = [];

while (($data = fgetcsv($arxiu, 0,";")) == true) {
    $num = count($data);
    $filtro = array_filter($data,"filtrar");
    if (!is_null($filtro)){
        array_push($lista,$filtro);
    }
}
fclose($arxiu);
ordenar($lista,11);
echo "<table>";
foreach ($lista as $key => $jugador) {
    echo "<tr>";
    echo "<td>".$jugador[4]."</td>";
    echo "<td>".$jugador[7]."</td>";
    echo "<td>".$jugador[9]."</td>";
    echo "<td>".$jugador[11]."</td>";
    echo "<td>".$jugador[10]."</td>";
    echo "<td>".$jugador[17]."</td>";
    echo "</tr>";
}
echo "</table>";


function filtrar($cadena){
    return strcmp($cadena,"Athletic Club");
}



function ordenar($arrayAOrdenar,$fila){
    $orden = SORT_ASC;
    $newArray = array();
    foreach ($arrayAOrdenar as $item => $value){
        if (is_object($value)){
            $newArray[$item] = $value->$fila;
        }else{
            $newArray[$item] = $value[$fila];
        }
        $newArray[$item] = strtolower($newArray[$item]);
    }
    array_multisort($newArray,$orden,$arrayAOrdenar);
}

require_once("fitxers.view.php");