<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Uniforme {

    private $a;
    private $b;
    private $unif01;

    public function __construct($a,$b, VariablesAleatoriasUniforme $unif01) {
        $this->a = $a;
        $this->b = $b;
        $this->unif01 = $unif01;
    }

    public function generar($n){
        $unifC=$this->unif01->generar($n);  
        $unifD=array();
        for($i = 0; $i < $n; $i++){
            $unifD[$i] = $this->a + (($this->b-$this->a+1)*$unifC[$i]);
        }
        return $unifD;
    }
}

?>
