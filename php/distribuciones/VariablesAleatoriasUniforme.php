<?php
class VariablesAleatoriasUniforme{
    private $a;
    private $b;
    private $m;
    private $x;
    private $u;
    private $semilla;

    function __construct($a, $b, $m, $semilla = null){
        $this->a = $a;
        $this->b = $b;
        $this->m = $m;
        $this->semilla =($semilla != null)?$semilla:  rand(1, 10000);
        $this->x = $semilla;
    }

    function generarUniforme($n){
        $uniforme = array();
        $x = 0.0;
        $uniforme[0] = $this->semilla;
        for($i = 1; $i < $n ; $i++){
            $x = (($x*$this->a)+$this->b)%$this->m;
            $uniforme[$i] = $x/$this->m;
        }
        return $uniforme;
    }

    function nextUniforme(){
        $this->x = (($this->x*$this->a)+$this->b)%$this->m;
        $this->u = $this->x/$this->m;
        return $this->u;
    }
}
?>
