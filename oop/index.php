<?php 

    class user {
        public $name;
        public $email;
        public $password;
        public $access;

        public function __construct($n,$e,$p)
        {
            $this->name = $n;
            $this->email = $e;
            $this->password = $p;
        }

        public function userInfo(){
            return "Name: $this->name <br>
                    Email: $this->email <br>
                    Password: $this->password
                    User: Aam User
            ";
        }
    }


    class admin extends user {
        public function adminInfo(){
            return "Name: $this->name <br>
                    Email: $this->email <br>
                    Password: $this->password <br>
                    User: Admin
            ";
        }
    }


    $adm1 = new admin('admin','admin@email.com','5468435');
    echo $adm1->adminInfo();

    echo '<br><br>';

    $obj1 = new user('John','john@email.com','12345678');
    echo $obj1->userInfo();
    
    // $obj2 = new user('John Singh','john@gmail.com','1324678');
    // $obj3 = new user('John Doe','doe@email.com','65468465');
    
    // echo $obj2->userInfo() . '<br> <br>';
    // echo $obj3->userInfo();
?>