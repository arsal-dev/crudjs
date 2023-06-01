<?php 

    class calculation {
        public $a;
        public $b;
        public $c;

        public function sum(){
            $this->c = $this->a + $this->b;
            return $this->c;
        }

        public function sub(){
            $this->c = $this->a - $this->b;
            return $this->c;
        }
    }

    $calc1 = new calculation;
    
    $calc1->a = 2;
    $calc1->b = 6;

    echo $calc1->sum();
    echo $calc1->sub();

    echo '<br>';


    // new obeject of the same class

    $calc2 = new calculation;
    
    $calc2->a = 6;
    $calc2->b = 66;

    echo $calc2->sum();
    echo $calc2->sub();

    ?>