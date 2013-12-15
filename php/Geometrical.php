<?php

//$seed=rand();
//$p=rand(1,99)/100;
////$seed=rand();
//$geo = new Geometrical();
//echo $geo->go($seed,$p);


class Geometrical {
       
    public function go($seed,$p){
        
        include_once("LCG.php");
        $uniform = new LCG();
        
        return ceil(log($uniform->go($seed)) / log(1.0 - $p));
    }
}

?>
