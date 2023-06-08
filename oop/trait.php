<?php
    trait traitName
    {
        public function test(){
            return 'This is a test trait';
        }
    }



    class childClass {
        use traitName;
    }

    $child = new childClass;
    echo $child->test();
?>