<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('Normal.php');
class LogNormal {
    //put your code here
    private $mu;
    private $teta;
    private $logNormal = array();
    private $va;
    private $normal;

    public function __construct($mu, $teta, VariablesAleatoriasUniforme $va) {
        $this->mu = $mu;
        $this->teta= $teta;
        $this->va = $va;
        $this->normal = new Normal(0.0, 1.0, $va);
    }

    public function generar($n){
        $normal = $this->normal->generar($n);
        for( $i = 0; $i  < $n ; $i++){
            $this->logNormal[$i] = exp($this->mu+($this->teta*$normal[$i]));
        }
        return $this->logNormal;
    }
}

?>
