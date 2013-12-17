<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Uniforme {
    private $n;
    private $m;
    private $va;
    private $uniformes = array();
    
    function __construct($n, $m, $va) {
        $this->n = $n;
        $this->m = $m;
        $this->va = $va;
    }
    
    function generarUniforme($n){
        for($i = 0; $i < $n; $i++){
            $this->uniformes[$i] = $this->m + (($this->n-$this->m+1)*$this->va->nextUniforme());
        }
        return $this->uniformes;
    }
}

?>
