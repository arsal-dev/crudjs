<?php 

    abstract class class1{
        protected $name;
        abstract protected function name();
    }

    class class2 extends class1{
        public function __construct($name)
        {
            $this->name = $name;
        }
        public function name(){
            return $this->name;
        }
    }


    $obj = new class2('John');
    echo $obj->name();




    class overriding{
        public $a = 'John';

        public function name(){
            return $this->a;
        }
    }

    class over2 extends overriding {
        public $a = 5;
        public $b = 10;


        public function name(){
            return $this->a + $this->b;
        }
    }

    $obj = new over2;
    echo $obj->name();
?>