<?php

//===========================================================================
//=  Function to generate exponentially distributed random variables        =
//=    - Input:  Mean value of distribution                                 =
//=    - Output: Returns with exponentially distributed random variable     =
//===========================================================================

//$s = 10;
//$unif = new Uniform();
//echo $uniform->go(0, 1);

class Uniform {

    public function go($a, $b) {

        return $a . "_hila_" . $b;
    }

}
?>

