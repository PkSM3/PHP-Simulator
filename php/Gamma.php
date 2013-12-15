<?php

$seed=rand();
$shape=rand();
$scale=rand();
$gam = new Gamma();

echo "seed:".$seed.", shape:".$shape.", scale:".$scale."<br>";
$out=$gam->go($seed,$shape,$scale);
if($out) echo ":".$out;
else echo 0;

/*
 * Input1: The seed s
 * Input2: Mean
 * Input3: Standart deviation
 * Output: the random-gaussian val
 */
class Gamma {
    
    public function go($s, $shape, $scale){

	return "en construccion";
#        include_once("Gaussian.php");
#        $gaussian = new Gaussian();
#        include_once("LCG.php");
#        $uniform = new LCG();
#                
#        if ($shape >= 1.0){
#            $d = $shape - 1.0/3.0;
#            $c = 1.0/sqrt(9.0*$d);
#        
#            while(true){
#                do {
#                    $x = $gaussian->go($s,$shape,$scale); //get Normal
#                    $v = 1.0 + $c*$x;
#                } while ($v <= 0.0);


#                $v = $v*$v*$v;

#                $u=$uniform->go($s);// get Uniform(0,1)  -> U
#                $xsquared = $x*$x;

#                if ($u < 1.0 -.0331*$xsquared*$xsquared || log($u) < 0.5*$xsquared + $d*(1.0 - $v + log($v))) return $scale*$d*$v;
#            }
#        } else {
#            
#            $g = go($s,$shape+1.0, 1.0);
#            $w = $uniform->go($s);
#            return $scale*$g*pow($w, 1.0/$shape);
#        }
        
    }
    
    
//    public function go0($s, $alpha, $lambda) {
//        $x=0;
//        if($alpha>1) {
//            
//            $d=$alpha-1/3; 
//            $c=1/sqrt(9*$d);
//            $flag=1;
//            while($flag){     
//                include_once("Gaussian.php");
//                $gaussian = new Gaussian();
//                $Z = $gaussian->go($s,$lambda,$alpha); //get Normal
//                
//                if ($Z>-1/$c){
//                    $V=pow((1+$c*$Z),3);                     
//
//                    include_once("LCG.php");
//                    $unif = new LCG();
//                    $U = $unif->go($s); // get Uniform(0,1)  -> U
//                    $flag=(log($U)>(0.5*pow($Z,2)+$d-$d*$V+$d*log($V)));                    
//                }
//            }
//            $x=$d*$V/$lambda;
//        } else {
//            $x=go($s,$alpha+1,$lambda);
//            
//            include_once("LCG.php");
//            $unif = new LCG();            
//            $x=$x*pow($unif->go($s),(1/$alpha));
//        }
//        
//        return $x;
//    }
//    
//http://www.hongliangjie.com/2012/12/19/how-to-generate-gamma-random-variables/
//    public function go1($r, $a, $b) {
//        if ($a < 1) {
//            include_once("LCG.php");
//            $unif = new LCG();
//            $u = $unif->go($r); //Uniform(0,1)  -> u
//            return go($r, 1.0 + $a, $b) * pow($u, 1.0 / $a);
//        } else {
//            $x = 0;
//            $v = 0;
//            $u = 0;
//            $d = $a - 1.0 / 3.0;
//            $c = (1.0 / 3.0) / sqrt($d);
//            while (true) {
//
//                do {
//                    include_once("Gaussian.php");
//                    $gaussian = new Gaussian();
//                    $x = $gaussian->go($r);
//                    $v = 1.0 + $c * $x;
//                } while ($v <= 0);
//                
//                $v = $v * $v * $v;
//
//                include_once("LCG.php");
//                $unif = new LCG();
//                $u = $unif->go($r);
//
//                if ($u < 1 - 0.0331 * $x * $x * $x * $x)
//                    break;
//
//                if (log($u) < 0.5 * $x * $x + $d * (1 - $v + log($v)))
//                    break;
//            }
//            return $b * $d * $v;
//        }
//    }

}
?>
