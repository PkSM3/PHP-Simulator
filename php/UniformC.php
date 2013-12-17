<?php

//~ $s=rand();
//~ $lcg = new UniformC();
//~ echo $lcg->go($s);

/*
 * Input: The seed
 * Output: the random val
 */
class UniformC {

    public function go($seed) {
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

}
?>

