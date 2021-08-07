<?php 
    session_start();
    class Account extends DB{
        public function getGuest(){
            $sql = 'SELECT * FROM account';
            return mysqli_query($this->conn, $sql);
        }  

        public function checkRegister($username){
            $username = mysqli_real_escape_string($this->conn,$username);
            $sql = "SELECT * FROM account WHERE username = '$username'";
            $account = mysqli_query($this->conn,$sql);
            if($account){
                if(mysqli_num_rows($account) > 0){
                    return false;
                }
                return true;
            }
        }

        public function register($username, $password, $email){
            $username = mysqli_real_escape_string($this->conn,$username);
            $password = password_hash(mysqli_real_escape_string($this->conn,$password),PASSWORD_DEFAULT); 
            $email = mysqli_real_escape_string($this->conn,$email);
            $sql = "INSERT INTO `account`(`username`,`password`,`email`) VALUES('$username','$password','$email')";
            if(mysqli_query($this->conn, $sql)){
                return true;
            }
            return false;
        }
        
        public function checkLogin($username, $password){
            
        }

        //Random pasword
        public function randPass($n){
            $char = 'qwertyuiopasdfghjklzxcvbnm1234567890';
            $password = '';
            $length = strlen($char) - 1;
            while(strlen($password) < $n){
                $password .= $char[mt_rand(0, $length)];
            }
            $password = password_hash($password,PASSWORD_DEFAULT);
            return $password;
        }

        //Check xem email tồn tại chưa
        public function checkEmail($email){
            $sql = "SELECT * FROM account WHERE email = '$email'";
            $email = mysqli_query($this->conn, $sql);
            if(mysqli_num_rows($email)>0){
                return false;
            }
            return true;
        }

        //Thêm account đăng nhập bằng google
        public function insertAccount( $name, $email, $avatar){
            $password = $this->randPass(10);
            $account = [
                'username' => $email,
                'password' => $password,
                'name' => $name,
                'email' => $email,
                'avatar' => $avatar,
            ];
            $sql = "INSERT INTO `account`(`username`,`password`,`name`,`email`,`avatar`) VALUES('$email','$password','$name','$email','$avatar')";
            if($this->checkEmail($email) == true){
                if(mysqli_query($this->conn,$sql)){
                    $_SESSION['login'] = $account;
                    // setcookie("user", $email, time()+60*60, "/", NULL);
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $_SESSION['login'] = $account;
                // setcookie("user", $email, time()+60*60, "/", NULL);
                return true;
            }
        }
    }
?>