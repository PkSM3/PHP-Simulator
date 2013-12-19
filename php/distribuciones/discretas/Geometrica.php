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
    private $unif01;

    function __construct($p, VariablesAleatoriasUniforme $unif01) {
        $this->p = $p;
        $this->unif01 = $unif01;
    }

    function generar($n){
        $unif=$this->unif01->generar($n);
        //$restaP = 1- $this->p;
        for($i = 0; $i < $n; $i++){
            //$this->geometrica[$i] = log($this->unif01->nextUniforme())/log($restaP);
            $this->geometrica[$i] = ceil(log($unif[$i]) / log(1.0 - $this->p));
        }
        return $this->geometrica;
    }
}

?>
