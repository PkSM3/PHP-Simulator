<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Beta
 *
 * @author jaime
 */
class Beta {
    //put your code here
    private $a;
    private $b;
    private $beta = array();
    private $va;
    
    public function __construct($a, $b, $va) {
        $this->a = $a;
        $this->b = $b;
        $this->va = $va;
    }
    
    public function generarBeta($n){
        $gamma = new Gamma(1.0, $this->a, $this->va);
        $distribucionGamma1 = $gamma->generarGamma($n);
        $gamma->setB($this->b);
        $distribucionGamma2 = $gamma->generarGamma($n);
        for($i = 0; $i < $n; $i++){
            $this->beta[$i] = $distribucionGamma1[$i]/($distribucionGamma1[$i] + $distribucionGamma2[$i]);
        }
        return this.getBeta();
    }
}

?>
