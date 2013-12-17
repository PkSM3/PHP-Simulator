<?php

//$p=0.5;
//$s=rand();
//$bern = new Bernoulli();
//echo $bern->go($s,$p);

/*
 * Input1: The seed s
 * Input2: The succeed probability p
 * Output: the random val: 1 or 0
 */
class Bernoulli {

    public function go($seed,$p) {
        $bern_out = 0;
        include_once("UniformC.php");
        $unif = new UniformC();

        $uniform01 = $unif->go($seed);

        if($uniform01 <= $p) echo 1;
        else return 0;
    }

}

?>
