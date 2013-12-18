<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bernoulli
 *
 * @author jaime
 */
class Bernoulli {
    //put your code here
    private $p;
    private $bernoulli = array();
    private $va;

    function __construct($p, VariablesAleatoriasUniforme $va) {
        $this->p = $p;
        $this->va = $va;
    }

    function generar($n){
        for($i = 0; $i < $n; $i++){
            $this->bernoulli[$i] = (bool)($this->va->nextUniforme() <= $this->p);
        }
        return $this->bernoulli;
    }
}

?>
