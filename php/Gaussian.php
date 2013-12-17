<?php

//$mean=20;
//$sdv=2;
//$seed=rand();
//$gau = new Gaussian();
//echo $gau->go($seed,$mean,$sdv);

/*
 * Input1: The seed s
 * Input2: Mean
 * Input3: Standart deviation
 * Output: the random-gaussian val
 */
class Gaussian {

    public function go($seed,$mean,$sdv) {

        include_once("UniformC.php");
        $unif01 = new UniformC();

        $u1 = $unif01->go($seed);  //Uniform 1
        $u2 = $unif01->go($u1*$seed);  //Uniform 2

        $r = sqrt( -2.0*log($u1) );
        $theta = 2.0*pi()*$u2;
        return $mean + $sdv * $r * sin($theta);
    }

}
?>
