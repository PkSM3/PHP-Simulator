<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Normal
 *
 * @author jaime
 */
class Normal {
    //put your code here
    private $mu;
    private $teta;
    private $normal = array();
    private $va;

    public function __construct($mu, $teta, $va) {
        $this->mu = $mu;
        $this->teta = $teta;
        $this->va = $va;
    }

    public function generar($n){
        $pi = 2*M_PI;
        for($i = 0 ; $i < n; $i++){
            $this->normal[i] = $this->mu + $this->teta *(sin($pi*$this->va->nextUniforme())*sqrt(-2*log($this->va->nextUniforme())) );
        }
        return $this->normal;
    }
}

?>
