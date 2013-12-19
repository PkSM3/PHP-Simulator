<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once './VariablesAleatoriasUniforme.php';
//Seteo los valores del post
$tipo_distribucion 	= isset($_POST['tipo_distribucion'])?$_POST['tipo_distribucion']:null;
$iteraciones 		= isset($_POST['iteraciones'])?$_POST['iteraciones']:null;
$semilla 			= isset($_POST['semilla'])?$_POST['semilla']:rand(10e6 , 10e10);
$a 					= isset($_POST['a'])?$_POST['a']:null;
$b 					= isset($_POST['b'])?$_POST['b']:null;
$p 					= isset($_POST['p'])?$_POST['p']:null;
$teta 				= isset($_POST['teta'])?$_POST['teta']:null;
$mu 				= isset($_POST['mu'])?$_POST['mu']:null;
$lambda 			= isset($_POST['lambda'])?$_POST['lambda']:null;

//~ echo $iteraciones;
//~ echo $semilla;
//~ echo $lambda;
//~ exit;
//Inicializo mi objeto VariablesAleatoriasUniforme, el cual sigue una distribucion unifomre 0,1
include('./VariablesAleatoriasUniforme.php');
$va = new VariablesAleatoriasUniforme($semilla);

//Variable que sera instanciada con alguno de los objetos en base al switch
$object = null;
//array de resultados despues de generar la distribucion
$result = array();
//contador
$i = 1;

switch($tipo_distribucion){
	case 'normal':
		include_once('continuas/Normal.php');
		$object = new Normal($mu, $teta, $va);
	break;
	case 'log-normal':
		include_once('continuas/LogNormal.php');
		$object = new LogNormal($mu, $teta, $va);
	break;
	case 'uniforme continuia':
		include_once('continuas/Uniforme.php');
		$object = new Uniforme($a, $b, $va);
	break;
	case 'uniforme discreta':
		include_once('discretas/Uniforme.php');
		$object = new Uniforme($a, $b, $va);
	break;
	case 'beta':
		include_once('continuas/Beta.php');
		$object = new Beta($a, $b, $va);
	break;
	case 'gamma':
		include_once('continuas/Gamma.php');
		$object = new Gamma($lambda, $va);
	break;
	case 'bernoulli':
		include_once('discretas/Binomial.php');
		$object = new Bernoulli($p, $va);
	break;
	case 'geométrica':
		include_once('discretas/Geometrica.php');
		$object = new Geometrica($p, $va);
	break;
	//~ case 'binomial':
		//~ include_once('./discretas/Binomial.php');
		//~ $object = new Binomial();
	//~ break;
	case 'poisson':
		include_once('discretas/Poisson.php');
		$object = new Poisson($lambda, $va);
	break;
	case 'exponencial':
		include_once('continuas/Exponencial.php');
		$object = new Exponencial($lambda, $va);
	break;
	default:
		echo '<h2>Problemas al generar la distribución</h2>';
		exit;
	break;
}
$array = $object->generar($iteraciones);

$finalarray=array();
$info=array();
array_push($info,"Dinosaur");
array_push($info,"Length");
array_push($finalarray,$info);

foreach($array as $key => $value){
    $info=array();
    array_push($info,$key);
    array_push($info,$value);
    array_push($finalarray,$info);
}

echo json_encode($finalarray);


?>