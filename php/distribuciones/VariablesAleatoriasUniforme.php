<?php
class VariablesAleatoriasUniforme{
    private $x;
    private $n;
    private $semilla;

    function __construct($semilla = null){
        $this->semilla =($semilla != null)?$semilla:  rand(1, 10000);
        $this->x = $this->semilla;
    }
//
////
    public function nextUniforme($seed){
        $a = 16807;  // Multiplier
        $m = 2147483647;  // Mod
        $q = 127773;  // m div a
        $r = 2836;  // m mod a
        $x = 0; // Random int value
        $x_div_q = 0; // x divided by q
        $x_mod_q = 0; // x mod q
        $x_new = 0;           // New x value
        if ($seed > 0)
            $x = $seed;
        // RNG using integer arithmetic
        $x_div_q = $x / $q;

        //x_n = 7^5*x_(n-1)mod(2^31 - 1)
        $x_mod_q = $x % $q;
        $x_new = ($a * $x_mod_q) - ($r * $x_div_q);

        if ($x_new > 0)
            $x = $x_new;
        else
            $x = $x_new + $m;

        // Return a random value between 0.0 and 1.0
        return ( $x / $m );
    }

    public function getSemilla(){
		return $this->semilla;
	}
        
        
    public function generar($n){
        $x = $this->semilla;
        $a = array();
        $a[0] = $this->nextUniforme($x);
        for($i = 1; $i < $n; $i++){
            $a[$i]=$this->nextUniforme($x * $a[$i-1]);
        }        
        return $a;
    }
}
?>
