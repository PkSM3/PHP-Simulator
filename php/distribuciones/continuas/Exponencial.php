<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exponencial
 *
 * @author jaime
 */
class Exponencial {
    //put your code here
    private $lambda;
    private $exponencial = array();
    private $unif01;

    public function __construct($lambda, VariablesAleatoriasUniforme $unif01) {
        $this->lambda = $lambda;
        $this->unif01 = $unif01;
    }

    public function generar($n){
        $unif=$this->unif01->generar($n);
        for($i = 0; $i < $n; $i++){
            $this->exponencial[$i] = -1*  $this->lambda*(log($unif[$i]));
        }
        return $this->exponencial;
    }
}

?>
