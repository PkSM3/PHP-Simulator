<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Geometrica
 *
 * @author jaime
 */
class Geometrica {
    //put your code here
    private $p;
    private $geometrica = array();
    private $va;
    
    function __construct($p, $va) {
        $this->p = $p;
        $this->va = $va;
    }
    
    function generarGeometrica($n){
        $restaP = 1- $this->p;
        $distribucionUniforme = $this->va->generarUniforme($n);
        for($i = 0; $i < $n; $i++){
            $this->geometrica[$i] = log($this->va->nextUniforme())/log($restaP);
        }
        return $this->geometrica;
    }
}

?>
