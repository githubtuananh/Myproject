<?php 
    class Apps extends DB{
        public function getApps(){
            $sql = 'SELECT * FROM app';
            return mysqli_query($this->conn, $sql);
        }

// ---------------------------------MOBILE-----------------------------------------
        public function getAppsMb(){
            $sql = 'SELECT * FROM app LIMIT 2';
            return mysqli_query($this->conn, $sql);
        }

        //Lấy danh sách sách bán chạy nhất
        public function getAppBestDownMb(){
            $sql = "SELECT * FROM app ORDER BY countinstall DESC LIMIT 2";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy thêm danh sách app được tải nhiều nhất
        public function getAppBestDownMbPlus(){
            $sql = "SELECT * FROM app ORDER BY countinstall DESC";
            return mysqli_query($this->conn, $sql);
        }
// ---------------------------------COMPUTER-----------------------------------------

        //Lấy danh sách sách bán chạy nhất
        public function getAppBestDown(){
            $sql = "SELECT * FROM app ORDER BY countinstall";
            return mysqli_query($this->conn, $sql);
        }
    }
?>