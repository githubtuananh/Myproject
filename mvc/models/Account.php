<?php 
    session_start();
    class Account extends DB{
        //Lấy thông tin khách hàng
        public function getGuest(){
            $sql = 'SELECT * FROM account';
            return mysqli_query($this->conn, $sql);
        }  
        
        //Lấy thông tin người dùng theo username
        public function getUserById($username){
            $username = mysqli_real_escape_string($this->conn, $username);
            $sql = "SELECT * FROM account WHERE username  = '$username' LIMIT 1";
            return mysqli_query($this->conn, $sql);
        }

        //Kiểm tra username đăng kí có trùng hay không
        public function checkRegister($username){
            $account = $this->getUserById($username);
            if($account){
                if(mysqli_num_rows($account) > 0){
                    return false;
                }
                return true;
            }
        }

        //Thêm account sau khi đăng kí thành công
        public function register($username, $password, $email){
            $username = mysqli_real_escape_string($this->conn,$username);
            $password = password_hash(mysqli_real_escape_string($this->conn,$password),PASSWORD_DEFAULT); 
            $email    = mysqli_real_escape_string($this->conn,$email);
            $sql = "INSERT INTO `account`(`username`,`password`,`email`) VALUES('$username','$password','$email')";
            if(mysqli_query($this->conn, $sql)){
                return true;
            }
            return false;
        }

        //Kiểm tra xem tài khoản đăng nhập có tồn tại không
        public function checkLogin($username){
            $account = $this->getUserById($username);
            if($account){
                if(mysqli_num_rows($account) == 1){
                    return true;
                }return false;
            }
        }

        //Kiểm tra password có đúng không
        public function checkPassword($username, $password){
            $account = $this->getUserById($username);
            $passwordTrue = mysqli_fetch_array($account)['password'];
            if(!password_verify($password,$passwordTrue)){
                return false;
            }
            $account = [
                'username' => $username,
                'password' => $password,
                'name' => 'Tài khoản',
                'email' => '',
                'avatar' => '',
            ];
            $_SESSION['login'] = $account;
            return true;
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