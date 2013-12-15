<?php

//$seed=rand();
//$p=rand(1,99)/100;
////$seed=rand();
//$geo = new Geometrical();
//echo $geo->go($seed,$p);


class Geometrical {
       
    public function go($seed,$p){
        
        include_once("UniformC.php");
        $uniform01 = new UniformC();
        
        return ceil(log($uniform01->go($seed)) / log(1.0 - $p));
    }
}

?>
