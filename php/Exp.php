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

    public function go($seed,$mean) {
        $z = 0; // Uniform random number (0 < z < 1)
        $exp_value = 0; // Computed exponential value to be returned
        $x = $mean;

        do {
            include_once("UniformC.php");
            $unif01 = new UniformC();
            $z = $unif01->go($seed);
        } while (($z == 0) or ($z == 1));

        $exp_value = -$x * log($z);
        return ($exp_value);
    }

}
?>

