<?php

//$mean=rand(1,20);
//$sdv=rand(2,6);
//$seed=rand();
//$lnor = new LogNormal();
//echo $lnor->go($seed,$mean,$sdv);

class LogNormal {
    //mu+sigma*N(mu,sigma)
    
    public function go($seed,$mu,$sigma){   
        include_once("Gaussian.php");
        $gau = new Gaussian();
        $normal=$gau->go($seed,$mu,$sigma);
        
        return $mu+$sigma*$normal;
    }
}

?>
