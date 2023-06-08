<?php

    class crud
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $db_name = 'oop_crud';

        private $db_conn;

        public function __construct()
        {
            $this->db_conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        }

        public function read($table, $id = null){

            if($id == null){
                $query = "SELECT * FROM $table";
                $result = $this->db_conn->query($query);
    
                return $result->fetch_assoc();
            }
            else {
                $query = "SELECT * FROM $table WHERE id = $id";
                $result = $this->db_conn->query($query);
    
                return $result->fetch_assoc();
            }

        }

        public function delete($table, $id){
            $query = "DELETE FROM $table WHERE id = $id";
            $this->db_conn->query($query);
            return "user Deleted Successfully";
        }        
    }

    $crud = new crud;
    print_r($crud->read('users'));
?>