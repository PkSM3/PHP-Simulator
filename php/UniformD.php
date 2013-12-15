<?php

$seed=rand();
$unifD= new UniformD();
$unifD->go($seed,10,20);

class UniformD {
    public function go($seed,$min,$max){
        $z=0;// Uniform random integer number
        $unif_value=0;// Computed uniform value to be returned

        // Pull a uniform random integer
        include_once("UniformC.php");
        $uniform01 = new UniformC();
        $z = $uniform01->go($seed);
        // Compute uniform discrete random variable using inversion method
        $unif_value = $min+$z*($max-$min);
        return ceil($unif_value);
    }
}

?>
