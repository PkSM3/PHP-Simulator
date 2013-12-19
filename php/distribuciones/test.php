<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$n=100;
$semilla=rand(10e6 , 10e10);//Resultados decentes, con semilla = [10e6 , 10e10]
include('./VariablesAleatoriasUniforme.php');
$va = new VariablesAleatoriasUniforme($semilla);

include_once('./continuas/Exponencial.php');
$uniforme = new Exponencial(10, $va);
$array = $uniforme->generar(100);
echo '<pre>';
print_r($array);
echo '</pre>';exit;
?>
