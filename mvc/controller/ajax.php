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
                <p id="title">Đăng nhập</p>
                <form action="/demoGooglePlay/store/login" method="post" class="">
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

        // Xử lý đăng kí
        public function register(){
            echo '<div class="page-register">
                <p id="title">Đăng kí</p>
                <form action="" method="post" class="">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Tài khoản" required>
                    </div>
                    <div class="form-group">
                        <input unmark="show" name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <input unmark="show" name="password-confirm" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required>
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
                </form>
            </div>';
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