<?php

#$s=10;
#$exp = new Exp();
#echo $exp->go($s);

/*
 * Input: The mean
 * Output: the random val
 */

class Exp {

    //public $mean;

    public function go($mean) {
        $z = 0; // Uniform random number (0 < z < 1)
        $exp_value = 0; // Computed exponential value to be returned
        $x = $mean;

        do {
            include_once("LCG.php");
            $lcg = new LCG();
            $seed = rand();
            $z = $lcg->go($seed);
        } while (($z == 0) or ($z == 1));

        $exp_value = -$x * log($z);
        return ($exp_value);
    }

}
?>

