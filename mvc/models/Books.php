<?php 
    class Books extends DB{
        public function getBooks(){
            $sql = 'SELECT * FROM book';
            return mysqli_query($this->conn, $sql);
        }

// ---------------------------------MOBILE-----------------------------------------
        public function getBooksMb(){
            $sql = 'SELECT * FROM book LIMIT 2';
            return mysqli_query($this->conn, $sql);
        }
 
        //Lấy danh sách sách bán chạy nhất
        public function getBookBestSaleMb(){
            $sql = "SELECT * FROM book ORDER BY countbuy DESC LIMIT 2";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy thêm danh sách sách bán chạy nhất
        public function getBookBestSaleMbPlus(){
            $sql = "SELECT * FROM book ORDER BY countbuy DESC";
            return mysqli_query($this->conn, $sql);
        }
// ---------------------------------COMPUTER-----------------------------------------
        //Lấy danh sách sách bán chạy nhất
        public function getBookBestSale(){
            $sql = "SELECT * FROM book ORDER BY countbuy DESC";
            return mysqli_query($this->conn, $sql);
        }
    }
