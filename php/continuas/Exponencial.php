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
    private $unif01;

    public function __construct($lambda, VariablesAleatoriasUniforme $unif01) {
        $this->lambda = $lambda;
        $this->unif01 = $unif01;
    }

    public function generar($n){
        $exponencial=array();
        for($i = 0; $i < $n; $i++){
            $exponencial[$i] = -1.0*  $this->lambda*(log($this->unif01->nextUniforme()));
        }
        return $exponencial;
    }
}

?>
