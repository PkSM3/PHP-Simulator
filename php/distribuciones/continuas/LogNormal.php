<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class LogNormal {
    //put your code here
    private $mu;
    private $teta;
    private $logNormal = array();
    private $va;
    private $normal;

    public function __construct($mu, $teta, $va) {
        $this->mu = $mu;
        $this->teta= $teta;
        $this->va = $va;
        $this->normal = new Normal(0.0, 1.0, $va);
    }

    public function generar($n){
        $distribucionNormal = $this->normal->generarNormal(n);
        for( $i = 0; $i  < $n ; $i++){
            $this->logNormal[$i] = exp($this->mu+($this->teta*$distribucionNormal[$i]));
        }
        return $this->logNormal;
    }
}

?>
