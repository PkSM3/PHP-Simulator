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
class Gamma {
    //put your code here
    private $lambda;
    private $b;
    private $gamma = array();
    private $va;

    public function __construct($lambda, $b, VariablesAleatoriasUniforme $va) {
        $this->lambda = $lambda;
        $this->b = $b;
        $this->va = $va;
    }

    public function generar($n){
        $vaUniforme = $this->va->generar($this->b);
        $mult = 1.0;
        for($i = 0; $i < $this->b; $i++)
            $mult *= $vaUniforme[$i];
        for($i = 0; $i < $n; $i++){
            $this->gamma[$i] = -1*  $this->lambda*log($mult);
        }
        return $this->gamma;
    }

    public function setB($b){
        $this->b = $b;
    }
}

?>
