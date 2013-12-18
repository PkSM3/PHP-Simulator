<?php


$lmb=rand();
$s=rand();
$poiss = new Poisson();
echo $poiss->go($s,$lmb);


/*
 * Input: Lambda
 * Output: Poiss random var.
 */

class Poisson {

    public function go($s,$lambda) {
		$L = exp(-1*$lambda);
		$p=1.0;
		$k=0;

        include_once("UniformC.php");
        $unif01 = new UniformC();

		do {
			$k+=1;
			$p*= $unif01->go($s);
		} while($p>$L);

		return $k-1;
    }

}
?>



