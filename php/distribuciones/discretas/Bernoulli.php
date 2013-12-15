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
    
    function __construct($p, $va) {
        $this->p = $p;
        $this->va = $va;
    }
    
    function generarBernoulli($n){
        $distribucionUniforme = $this->va->generarUniforme($n);
        for($i = 0; $i < $n; $i++){
            $this->bernoulli[$i] = (bool)($distribucionUniforme[$i] <= $this->p);
        }
        return $this->bernoulli;
    }
}

?>
