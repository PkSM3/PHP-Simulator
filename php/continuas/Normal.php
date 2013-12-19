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
    private $mean;
    private $sdv;
    private $unif01;

    public function __construct($mean,$sdv, VariablesAleatoriasUniforme $unif01) {
        $this->mean = $mean;
        $this->sdv = $sdv;
        $this->unif01 = $unif01;
    }
    
    public function gen1($x){
        $u1 = $this->unif01->nextUniforme($x);  //Uniform 1
        $u2 = $this->unif01->nextUniforme($u1*$x);  //Uniform 2

        $r = sqrt( -2.0*log($u1) );
        $theta = 2.0*pi()*$u2;
        return abs($this->mean + $this->sdv * $r * sin($theta))+1;
        //el retorno debe ser positivo y mayor que 1!!
    }

    public function generar($n){
        $seed=$this->unif01->getSemilla();
        $normal=array();
        $normal[0]=$this->gen1($seed);
        for($i = 1; $i < $n; $i++){
            $s=$seed/($normal[$i-1]);
            $normal[$i]=$this->gen1($s);
        }
        return $normal;
    }
}

?>
