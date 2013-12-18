<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once './distribuciones/VariablesAleatoriasUniforme.php';
//Seteo los valores del post
$tipo_distribucion 	= isset($_POST['tipo_distribucion'])?$_POST['tipo_distribucion']:null;
$iteraciones 		= isset($_POST['iteraciones'])?$_POST['iteraciones']:null;
$semilla 			= isset($_POST['semilla'])?$_POST['semilla']:null;
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
$a = pow(7, 5);
$m = pow(2, 31) - 1;
$b = 0;
$va = new VariablesAleatoriasUniforme($a, $b, $m, $semilla);

//Variable que sera instanciada con alguno de los objetos en base al switch
$object = null;
//array de resultados despues de generar la distribucion
$result = array();
//contador
$i = 1;

switch($tipo_distribucion){
	case 'normal':
		include_once('distribuciones/continuas/Normal.php');
		$object = new Normal($mu, $teta, $va);
	break;
	case 'log-normal':
		include_once('distribuciones/continuas/LogNormal.php');
		$object = new LogNormal($mu, $teta, $va);
	break;
	case 'uniforme continuia':
		include_once('distribuciones/continuas/Uniforme.php');
		$object = new Uniforme($a, $b, $va);
	break;
	case 'uniforme discreta':
		include_once('distribuciones/discretas/Uniforme.php');
		$object = new Uniforme($a, $b, $va);
	break;
	case 'beta':
		include_once('distribuciones/continuas/Beta.php');
		$object = new Beta($a, $b, $va);
	break;
	case 'gamma':
		include_once('distribuciones/continuas/Gamma.php');
		$object = new Gamma($lambda, $b, $va);
	break;
	case 'bernoulli':
		include_once('distribuciones/discretas/Bernoulli.php');
		$object = new Bernoulli($p, $va);
	break;
	case 'geométrica':
		include_once('distribuciones/discretas/Geometrica.php');
		$object = new Geometrica($p, $va);
	break;
	//~ case 'binomial':
		//~ include_once('./distribuciones/discretas/Binomial.php');
		//~ $object = new Binomial();
	//~ break;
	//~ case 'poisson':
		//~ include_once('./distribuciones/discretas/Poisson.php');
		//~ $object = new Poisson();
	//~ break;
	case 'exponencial':
		include_once('distribuciones/continuas/Exponencial.php');
		$object = new Exponencial($lambda, $va);
	break;
	default:
		echo '<h2>Problemas al generar la distribución</h2>';
		exit;
	break;
}
$result = $object->generar($iteraciones);
?>
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Valores generados</h1>
            </div>
            <div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Valor</th>

                  </tr>
                </thead>
                <tbody>
				<?php foreach($result as $r){?>
                  <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $r?></td>
                  </tr>
                <?php }?>
                </tbody>
              </table>
            </div><!-- /example -->
          </div>
        </div>
      </div>
