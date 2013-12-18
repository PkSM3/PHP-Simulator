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
    private $va;

    public function __construct($lambda, VariablesAleatoriasUniforme $va) {
        $this->lambda = $lambda;
        $this->va = $va;
    }

    public function generar($n){
        for($i = 0; $i < $n; $i++){
            $this->exponencial[$i] = -1*  $this->lambda*(log($this->va->nextUniforme()));
        }
        return $this->exponencial;
    }
}

?>
