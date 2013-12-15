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
        
        include_once("LCG.php");
        $lcg = new LCG();
        
        $u1 = $lcg->go($seed);
        $u2 = $lcg->go($u1*$seed);
        
        $r = sqrt( -2.0*log($u1) );
        $theta = 2.0*pi()*$u2;
        return $mean + $sdv * $r * sin($theta);
    }
    
}
?>
