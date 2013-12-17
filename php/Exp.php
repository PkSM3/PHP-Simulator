<?php

$s=1;
$mean=200;
$exp = new Exp();
echo '<pre>';
print_r( $exp->iter($s, $mean, 100));
echo ' </pre>';

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

        //~ do {
            include_once("UniformC.php");
            $unif01 = new UniformC();
            $z = $unif01->go($seed);
        //~ } while (($z == 0) or ($z == 1));

        $exp_value = -1*$x * log($z);
        return ($exp_value);
    }

    public function iter($n, $seed,$mean){
		$arr=array();
		$a = $this->go($seed,$p);
		$arr[0] = $a;
		for($i = 1; $i < $n ; $i++){
			$aaa = $this->go($seed*rand(300,400),$mean);
			echo $aaa;
			$arr[$i] = $aaa;
		}
		return $arr;
	}

}
?>

