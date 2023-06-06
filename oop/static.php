<?php

    class newClass {
        public static $name = 'John';

        public static function show(){
            return self::$name;
        }
    }

    class childClass extends newClass {
        public static function newFunc(){
            return parent::$name;
        }
    }

    echo childClass::newFunc();

    // $child = new childClass;
    // echo $child->newFunc();

    // echo newClass::show();

?>