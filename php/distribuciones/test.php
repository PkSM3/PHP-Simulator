<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include('./VariablesAleatoriasUniforme.php');
include_once('./continuas/Exponencial.php');

$a = pow(7, 5);
$m = pow(2, 31) - 1;
$b = 0;
echo "a: ".$a.", m: ".$m.", b: ".$b;
$va = new VariablesAleatoriasUniforme($a, $b, $m);

$uniforme = new Exponencial(10, $va);
$array = $uniforme->generar(1000);
echo '<pre>';
print_r($array);
echo '</pre>';exit;
?>
