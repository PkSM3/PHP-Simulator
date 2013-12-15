<?

#$lmb=0.1;
#$poiss = new Poisson();
#echo $poiss->go($lmb);


/*
 * Input: Lambda
 * Output: Poiss random var.
 */

class Poisson {

    public function go($lambda) {
        $x = $lambda;
        $sum = 0.0; // Time sum value
        $outvar = 0; // The return
        // Loop to generate Poisson values using exponential distribution
        while (1) {
            include_once("Exp.php");
            $exp = new Exp();
            $sum = $sum + $exp->go($x);
            if ($sum >= 1.0)
                break;
            $outvar++;
        }
        return ($outvar);
    }

}
?>



