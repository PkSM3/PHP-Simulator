<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uniforme
 *
 * @author jaime
 */
class Uniforme {
    //put your code here
    private $a;
    private $b;
    private $uniformes = array();
    private $va;
    
    public function __construct($a, $b, $va) {
        $this->a = $a;
        $this->b = $b;
        $this->va = $va;
    }
    
    public function generarUniforme($n){
        $diff = $this->b-$this->a;
        for($i = 0; $i  < $n; $i++){
            $this->uniformes[$i] = $this->a + ($diff*$this->va->nextUniforme());
        }
        return $this->uniformes;
    }
}

?>
