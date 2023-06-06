<?php

    interface fly{
        function fly();
    }

    interface swim{
        function swim();
    }

    interface walk{
        function walk();
    }

    class cat implements fly , swim {
        public function fly(){
            return 5;
        }

        public function swim(){
            return 10;
        }

        public function both(){
            return $this->fly() + $this->swim();
        }
    }

    $child = new childClass;
    // $child->fly();
    // $child->swim();
?>