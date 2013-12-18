<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gamma
 *
 * @author jaime
 */
//
//$seed=rand();
//include_once("../../UniformC.php");
//$unif01 = new UniformC();
//$s = $unif01->go($seed);


$a = pow(7, 5);
$m = pow(2, 31) - 1;
$b = 0;

$seed=rand();
include('../VariablesAleatoriasUniforme.php');
$va = new VariablesAleatoriasUniforme($a, $b, $m,$seed);
$s=$va->nextUniforme();
$la=10;
$g=new Gamma($la,$s);
echo $g->gen1();
class Gamma {
    //put your code here
    private $lambda;
    private $gamma = array();
    private $va;

    public function __construct($lambda, $va) {
        $this->lambda = $lambda;
        $this->va = $va;
    }

    public function gen1(){
        // Algorithm:
        // http://en.wikipedia.org/wiki/Lanczos_approximation
        $x=$this->va;
        $ret=(1.000000000190015 +
                76.18009172947146 / ($x + 1) + 
                -86.50532032941677 / ($x + 2) + 
                -1.231739572450155 / ($x + 4) +
                1.208650973866179e-3 / ($x + 5) + 
                -5.395239384953e-6 / ($x + 6));
        
        return $ret * sqrt(2*pi())/$x * pow($x + 5.5, $x+.5) * exp(-$x-5.5);
    }
    
    public function generar($n){
        for($i = 0; $i < $n; $i++){
            $seed=$this->va->nextUniforme();
            $this->exponencial[$i] = -1*  $this->lambda*(log($seed));
        }
//        for($i = 0; $i < $this->b; $i++)
//            $mult *= $vaUniforme[$i];
//        for($i = 0; $i < $n; $i++){
//            $this->gamma[$i] = -1*  $this->lambda*log($mult);
//        }
        //return $ret;//$this->gamma;
    }

    public function setB($b){
        $this->b = $b;
    }
}

?>
