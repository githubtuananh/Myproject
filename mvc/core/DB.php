<?php 
    class DB{
        // protected $conn;
        // protected $host = 'sql101.epizy.com';
        // protected $user = 'epiz_28746779';
        // protected $pass = 'wQtdUv61D9g';
        // protected $db = 'epiz_28746779_GooglePlay';

        protected $conn;
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $db = 'googleplay';

        function __construct(){
            $this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
            mysqli_query($this->conn,'set names utf8');
        }
    }
?>