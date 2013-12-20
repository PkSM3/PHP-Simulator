<?php

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
header('Content-type: application/json');
require_once './VariablesAleatoriasUniforme2.php';
//Esto permite tanto post como get.
$tipo_distribucion 	= isset($_REQUEST['tipo_distribucion'])?$_REQUEST['tipo_distribucion']:null;
$iteraciones 		= isset($_REQUEST['iteraciones'])?$_REQUEST['iteraciones']:null;
$semilla 			= isset($_REQUEST['semilla'])?$_REQUEST['semilla']:rand();
$a 					= isset($_REQUEST['a'])?$_REQUEST['a']:null;
$b 					= isset($_REQUEST['b'])?$_REQUEST['b']:null;
$p 					= isset($_REQUEST['p'])?$_REQUEST['p']:null;
$teta 				= isset($_REQUEST['teta'])?$_REQUEST['teta']:null;
$mu 				= isset($_REQUEST['mu'])?$_REQUEST['mu']:null;
$lambda 			= isset($_REQUEST['lambda'])?$_REQUEST['lambda']:null;

//~ echo $iteraciones;
//~ echo $semilla;
//~ echo $lambda;
//~ exit;
//Inicializo mi objeto VariablesAleatoriasUniforme, el cual sigue una distribucion unifomre 0,1
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
	case 'binomial':
		include_once('discretas/Binomial.php');
		$object = new Binomial($p, $va);
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
		echo '<h2>Problemas al generar la distribución</h2><br>';
                echo "distribucion:".$_GET['tipo_distribucion']."<br>";
                echo "semilla:".$_GET['semilla']."<br>";
                echo "lambda:".$_GET['lambda']."<br>";
		exit;
	break;
}

        $tiempo_inicio = microtime_float();
//=========================================//
$array = $object->generar($iteraciones);

$dataArray=array();
$info=array();
array_push($info,"ID");
array_push($info,"Valor");
array_push($dataArray,$info);

foreach($array as $key => $value){
    $info=array();
    array_push($info,"s".$key);
    array_push($info,$value);
    array_push($dataArray,$info);
}
//=========================================//
        $tiempo_fin = microtime_float();

$tiempo = $tiempo_fin - $tiempo_inicio;

$finalArray=array();
$finalArray["data"]=$dataArray;
$finalArray["inicioRecupJSON"]=udate('H:i:s.u');
$finalArray["time"]=$tiempo;


if(isset($_GET['callback'])){ // Si es una petición cross-domain
   echo $_GET['callback'].'('.json_encode($finalArray).')';
}
else echo json_encode($finalArray);



function microtime_float() {
    list($useg, $seg) = explode(" ", microtime());
    return ((float)$useg + (float)$seg);
}

function udate($format, $utimestamp = null) {
    if (is_null($utimestamp))
        $utimestamp = microtime(true);

    $timestamp = floor($utimestamp);
    $milliseconds = round(($utimestamp - $timestamp) * 1000000);

    return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
}
?>