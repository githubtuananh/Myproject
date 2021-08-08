<?php 
    class controllerAjax extends controller{
        protected $modelApps;
        protected $modelMovies;
        protected $modelBooks;
        protected $modelsAccount;
        protected $views;

        public function __construct(){
            $this->modelsAccount = $this->model('Account');
            $this->modelMovies = $this->model('Movies');
            $this->modelBooks = $this->model('Books');
            $this->modelApps = $this->model('Apps');
        }

        // Xử lý đăng nhập
        public function login(){
            echo '<div class="page-login" >
                <i class="fa fa-times" aria-hidden="true"></i>
                <p id="title">Đăng nhập</p>
                <div class="message"></div>
                <form action="/demoGooglePlay/store/page_404" method="post" class="loginForm">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input id="password-field" unmark="show" name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="show-password">
                        <input type="checkbox" id="show-hide">
                        <label for="show-hide">
                            <span style="font-size: 1.2rem; color:#a09999; cursor: pointer;">Hiển thị mật khẩu</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-login" class="form-control btn btn-primary submit px-3">Sign In</button>
                    </div>
                    <div class="form-group support-account" >
                        <a href="" class="forget-password">Forgot Password ?</a>
                        <a href="" class="create-account">Create an account</a>
                    </div>
                    <span style="display:block;font-size:1.3rem;color:#ccc;text-align:center;margin-top:3.5rem;margin-bottom:2rem ">Hoặc đăng nhập với</span>
                    <div class="login-google">
                        <div id="google-button">
                            <p>Sign in with Google +</p>
                        </div>
                    </div>
                </form>
            </div>';
        }

        //Kiểm tra khi đăng nhập
        public function loginForm(){
            $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            $userExist = $this->modelsAccount->checkLogin($username);
            if(!empty($username) && !empty($password)){
                if(!$userExist){
                    exit("Tên đăng nhập không tồn tại");
                }else{
                    $isPass = $this->modelsAccount->checkPassword($username, $password);
                    if(!$isPass){
                        exit("Mật khẩu không chính xác"); 
                    }else{
                        exit(true);
                    }
                }
            }else{
                header('location: /demoGooglePlay/store/page_404');
            }
        }

        // Xử lý đăng kí
        public function register(){
            echo '<div class="page-register">
                <i class="fa fa-times" aria-hidden="true"></i>
                <p id="title">Đăng kí</p>
                <form action="/demoGooglePlay/store/page_404" method="post" class="registerForm">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <p class="message check-email"></p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Tài khoản" required>
                        <p class="message exist-username"></p>
                    </div>
                    <div class="form-group">
                        <input unmark="show" name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
                        <p class="message check-password"></p>
                    </div>
                    <div class="form-group">
                        <input unmark="show" name="password-confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required>
                        <p class="message check-passwordCf"></p>
                    </div>
                    <div class="show-password">
                        <input type="checkbox" id="show-hide">
                        <label for="show-hide">
                            <span style="font-size: 1.2rem; color:#a09999; cursor: pointer;">Hiển thị mật khẩu</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-register" class="form-control btn btn-primary submit px-3">Register</button>
                    </div>
                    <div class = "status">
                    </div>
                </form>
            </div>';
        }
        //Kiểm tra username đăng kí có bị trùng chưa
        public function checkUsername(){
            $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : '';
            if(!empty($username)){
                $exist = $this->modelsAccount->checkRegister($username);
                echo $exist;
            }else{
                header('location: /demoGooglePlay/store/page_404');
            }
        }
        //Kiểm tra và thêm user khi đăng kí
        public function registerForm(){
            $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
            $username = isset($_POST['username']) ? trim(htmlspecialchars($_POST['username'])) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            $passwordCf = isset($_POST['password-confirm']) ? htmlspecialchars($_POST['password-confirm']) : '';
            if(!empty($email) && !empty($username) && !empty($password) && !empty($passwordCf)){
                $result = $this->modelsAccount->Register($username, $password,$email);
                echo $result;
            }else{
                header('location: /demoGooglePlay/store/page_404');
            }
        }

        // -------------------------------------COMPUTER-------------------------





        // -------------------------------------MOBILE---------------------------
        //Load thêm dữ liệu
        public function loadData(){
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $classBtn = isset($_POST['classBtn']) ? $_POST['classBtn'] : '';
            $classBLock = isset($_POST['classBLock']) ? $_POST['classBLock'] : '';
            echo '
            <div class="item-container">
            <div class="container-title">
                <p>'.$title.'</p>
                <button class="'.$classBtn.'">Xem thêm</button>
            </div>
            <div class="block '.$classBLock.'">
            ';
            if($classBLock == 'filmBestSale'){
                $movies= $this->modelMovies->getMoviesBestSaleMbPlus();
                if(!empty($movies)){
                    while($row = mysqli_fetch_array($movies)){
                        echo '
                        <div class="items items-film">
                            <div class="img">
                                <img src='. $row['poster'] .' alt="">
                                <div class="block-playbtn">
                                <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="details-film ss">
                                <p class="name-film">'. $row['name'] .'</p>
                                <p class="type-film" >'. $row['genre'] .'</p>
                            </div>
                            <div class="evaluate-price">
                                <div class="evaluate">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <p class="price">'. $row['purchase'] .' <u>đ</u> </p>
                            </div>
                        </div>
                        ';
                    }
                }
                echo '</div> </div>';
            }
            elseif($classBLock == 'filmEarly'){
                $movies= $this->modelMovies->getMoviesEarlyMbPlus();
                if(!empty($movies)){
                    while($row = mysqli_fetch_array($movies)){
                        echo '
                        <div class="items items-film">
                            <div class="img">
                                <img src='. $row['poster'] .' alt="">
                                <div class="block-playbtn">
                                <i class="fa fa-play" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="details-film ss">
                                <p class="name-film">'. $row['name'] .'</p>
                                <p class="type-film" >'. $row['genre'] .'</p>
                            </div>
                            <div class="evaluate-price">
                                <div class="evaluate">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <p class="price">'. $row['purchase'] .' <u>đ</u> </p>
                            </div>
                        </div>
                        ';
                    }
                }
                echo '</div> </div>';
            }
            elseif($classBLock == 'bookBestSale'){
                $books= $this->modelBooks->getBookBestSaleMbPlus();
                if(!empty($books)){
                    while($row = mysqli_fetch_array($books)){
                        echo '
                        <div class="items items-book">
                        <div class="img">
                            <img src="'. $row['poster'] .'" alt="">
                        </div>
                        <div class="details-book">
                            <p class="name-book">'. $row['name'] .'</p>
                            <p class="actor" >'. $row['author'] .'</p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p class="price">'. $row['purchase'] .' <u>đ</u> </p>
                        </div>
                    </div>
                        ';
                    }
                }
                echo '</div> </div>';
            }
            elseif($classBLock == 'appBestDown'){
                $classBLock =  $classBLock.' block-app';
                $apps= $this->modelApps->getAppBestDownMbPlus();
                if(!empty($apps)){
                    while($row = mysqli_fetch_array($apps)){
                        echo '
                        <div class="items items-app">
                        <img src="'. $row['poster'] .'" alt="">
                        <div class="details-app">
                            <p class="name-app">'. $row['name'] .'</p>
                            <p class="producer" >'. $row['producer'] .'</p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <?php if('.$row['price'].'==0){
                                ?><p class="price">Free</p> <?php
                            } ?>
                            <?php if('.$row['price'].'!=0){
                                ?><p class="price">'. $row['price'] .' <u>đ</u></p> <?php
                            } ?>
                            
                        </div>
                    </div>
                        ';
                    }
                }
                echo '</div> </div>';
            }
        }

        //Load trang chủ
        public function loadHome(){
            echo '
                31231231
            ';
        }
    }
?>