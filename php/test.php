<?php

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$n=100;

$semilla=rand(10e6 , 10e10);//Resultados decentes, con semilla = [10e6 , 10e10]
include('./VariablesAleatoriasUniforme.php');
$va = new VariablesAleatoriasUniforme($semilla);

//include_once('./continuas/Exponencial.php');
//$exps = new Exponencial(10, $va);
//$array = $exps->generar($n);

//include_once('./continuas/Gamma.php');
//$gammas = new Gamma(10, $va);
//$array = $gammas->generar($n);

//include_once('./continuas/Normal.php');
//$mean=10;
//$sdv=4;
//$norms = new Normal($mean,$sdv, $va);
//$array = $norms->generar($n);

//include_once('./continuas/LogNormal.php');
//$mean=10;
//$sdv=4;
//$lg = new LogNormal($mean,$sdv, $va);
//$array = $lg->generar($n);

//include_once('./continuas/Beta.php');
//$a=20.0;
//$b=10.0;
//$b = new Beta($a,$b, $va);
//$array = $b->generar($n);


//include_once('./discretas/Binomial.php');
//$p=0.8;
//$bin = new Binomial($p, $va);
//$array = $bin->generar($n);

//include_once('./discretas/Geometrica.php');
//$p=0.9;
//$geo = new Geometrica($p, $va);
//$array = $geo->generar($n);

//include_once('./discretas/Poisson.php');
//$l=28;
//$poi = new Poisson($l, $va);
//$array = $poi->generar($n);

//include_once('./discretas/Uniforme.php');
//$a=5;
//$b=6;
//$ud = new Uniforme($a,$b, $va);
//$array = $ud->generar($n);

echo '<pre>';
print_r($array);
echo '</pre>';exit;
?>
