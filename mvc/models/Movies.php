<?php 
   class Movies extends DB{
        public function getMovies(){
            $sql = 'SELECT * FROM movies';
            return mysqli_query($this->conn, $sql);
        }  

        public function showMovies($idFilm){
            $sql = "SELECT * FROM movies WHERE idFilm = '$idFilm'";
            return mysqli_query($this->conn, $sql);
        }

        // public function getMoviesReponsive($w){
        //     if($w<=721){
        //         return [$this->getMoviesEarlyMb(), $this->getMoviesBestSaleMb()];
        //     }
        //     else{
        //         return[$this->getMoviesEarly(),$this->getMoviesBestSale()];
        //     }
        // }

// ---------------------------------MOBILE-----------------------------------------

        public function screenMobile(){
            $sql = 'SELECT * FROM movies LIMIT 2';
            return mysqli_query($this->conn, $sql);
        }
        
        //Lấy danh sách phim ra mắt sớm nhất
        public function getMoviesEarlyMb(){
            $sql = "SELECT * FROM movies ORDER BY date DESC LIMIT 2";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy danh sách phim bán chạy nhất
        public function getMoviesBestSaleMb(){
            $sql = "SELECT * FROM movies ORDER BY countbuy DESC LIMIT 2";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy thêm danh sách phim ra mắt sớm nhất
        public function getMoviesEarlyMbPlus(){
            $sql = "SELECT * FROM movies ORDER BY date DESC";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy thêm danh sách phim bán chạy nhất
        public function getMoviesBestSaleMbPlus(){
            $sql = "SELECT * FROM movies ORDER BY countbuy DESC";
            return mysqli_query($this->conn, $sql);
        }
        

// ---------------------------------COMPUTER-----------------------------------------

        //Lấy danh sách phim ra mắt sớm nhất
        public function getMoviesEarly(){
            $sql = "SELECT * FROM movies ORDER BY date DESC";
            return mysqli_query($this->conn, $sql);
        }

        //Lấy danh sách phim bán chạy nhất
        public function getMoviesBestSale(){
            $sql = "SELECT * FROM movies ORDER BY countbuy DESC";
            return mysqli_query($this->conn, $sql);
        }
    }
?>