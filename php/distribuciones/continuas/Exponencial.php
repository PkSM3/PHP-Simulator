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

    public function __construct($lambda, $va) {
        $this->lambda = $lambda;
        $this->va = $va;
    }

    public function generarExponenecial($n){
		$array = $this->va->generarUniforme($n);
        for($i = 0; $i < $n; $i++){
            $this->exponencial[$i] = -1*  $this->lambda*(log($array[$i]));
        }
        return $this->exponencial;
    }
}

?>
