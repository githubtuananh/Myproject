<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/demoGooglePlay/public/icon/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
    <link rel="stylesheet" href="/demoGooglePlay/public/css/css_store.css">
    <link rel="stylesheet" href="/demoGooglePlay/public/css/css_storeMobile.css">
    <title>LE TUAN ANH</title>
</head>
<body>
<div class="main">
<?php      
    if(!empty($data['viewMobile'])){
        require_once("./mvc/views/".$data['viewMobile'].".php");
    } 
?>
    <div class="loader-computer">
        <div class="block-loading">
            <lord-icon
                src="https://cdn.lordicon.com/ydcngaai.json"
                trigger="loop"
                colors="primary:rgba(11, 30, 48, 1),secondary:rgba(11, 30, 48, 1)"
                style="width:10rem;height:10rem">
            </lord-icon>
            <p style="color:rgba(11, 30, 48, 1); font-size: 1.3rem; margin-top:2rem"> Đang tải trang ...</p>
        </div>
    </div>
    <div class="cover-main"></div>
    <!-- Xử lý Header -->
        <header class="header">
            <!-- <a href="/demoGooglePlay/store"><img id="img-logo" src="/demoGooglePlay/public/img/logo.png" alt=""></a> -->
            <div id="img-logo" style="cursor:pointer; font-size:2rem;margin-top:0;color:#689f38;text-align:center"><i style="font-weight:bold;color:#ed3b3b">TUANANH</i>  Entertainment</div>
            <div class="form-group">
                <form action="">
                    <input type="text" placeholder="Tìm kiếm">
                </form>
            </div>
            <div class="login-register">
                <?php 
                    if(!isset($_SESSION['login'])){
                        ?>
                            <p href="" id="login" class="login">Đăng nhập</p>
                            <p href="" id="register" class="register">Đăng kí</p>
                        <?php
                    }
                    else{
                        ?>
                            <img class="avatar account" src="<?php echo $_SESSION['login']['avatar'] ?>" alt="">
                            <a href="/demoGooglePlay/API/logout" id='logout'>Đăng xuất</a>
                        <?php
                    }
                ?>
            </div>
        </header>

        <!-- Xử lý Header phụ -->
        <section class="sub-header">
            <div class="support">
                <div class="btn-support"><i class="fa fa-question-circle" aria-hidden="true"></i></div>
                <div class="btn-setting"><i class="fa fa-cog" aria-hidden="true"></i></div>
            </div>
            <div class="block-support">
                <div class="header">
                    <p class="title">Trợ giúp</p>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <div class="form-group">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Tìm kiếm trong trợ giúp">
                </div>
                <div class="bonus">
                    <p style="font-size:1.6rem; color:#3c4043; font-weight:bold;padding:3.5rem 0 1.5rem">
                    Bạn cần trợ giúp thêm ?</p>
                    <div class="block block-ask">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div>
                            <p style="font-weight:600">Đặt câu hỏi trên Cộng Đồng Trợ Giúp</p>
                            <p style="color:#5f6368">Nhận câu trả lời từ các chuyên gia trong cộng đồng</p>
                        </div>
                    </div>
                    <div class="block block-contact">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div>
                            <p style="font-weight:600">Liên hệ với chúng tôi</p>
                            <p style="color:#5f6368">Hãy giải thích thêm để chúng tôi hỗ trợ bạn tốt hơn</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end sub header -->

        <!-- Xử lý Menu(Ứng dụng , sách, phim, giải trí) -->
        <section class="menu">
            <div class="move menu-items game">
                <div class="icon item4"><i class="fa fa-th" aria-hidden="true"></i></div>
                <a href="/demoGooglePlay/store">Giải trí</a>
            </div> 
            <div class="move menu-items app">
                <div class="icon item1"><i class="fa fa-th-large" aria-hidden="true"></i></div>
                <a href="/demoGooglePlay/store/apps">Ứng dụng</a>
            </div>
            <div class="move menu-items film ">
                <div class="icon item2"><i class="fa fa-film" aria-hidden="true"></i></div>
                <a href="/demoGooglePlay/store/movies">Phim</a>
            </div>
            <div class="move menu-items book">
                <div class="icon item3"><i class="fa fa-book" aria-hidden="true"></i></div>
                <a href="/demoGooglePlay/store/books">Sách</a>
            </div>
            <div class="mess"></div> 
            <!-- Xử lý menu phụ -->
            <div class="sub-menu">
                <ul class="list-menu">
                    <li id="account">Tài khoản</li>
                    <li id="monney">Nạp tiền tài khoản</li>
                    <li id="list-like">Danh sách yêu thích</li>
                </ul>
            </div>
        </section><!-- end menu -->

        <!-- Xử lý phần thân chứa nội dụng -->
    <section class="container computer">
        <div class="item-container">
            <div class="container-title">
                <p>Phim bán chạy nhất</p>
                <button class="red">Xem thêm</button>
            </div>
            <div class="block filmBestSale">
                <!-- -------------------MOVIES-------------------------- -->
    <?php 
        if(!empty($data['listMoviesBestSale'])){
            while($row = mysqli_fetch_array($data['listMoviesBestSale'])){
                ?>
                    <div class="items items-film">
                        <div class="img">
                            <img src="<?= $row['poster'] ?>" alt="">
                            <div class="block-playbtn">
                            <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="details-film ss">
                            <p class="name-film"><?= $row['name'] ?></p>
                            <p class="type-film" ><?= $row['genre'] ?></p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p class="price"><?= $row['purchase'] ?> <u>đ</u> </p>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
                <!-- ------------------------------------------------------------->
            </div> <!--end filmBestSale -->
        </div> <!--end item-container -->


        <div class="item-container">
            <div class="container-title">
                <p>Phim mới ra mắt</p>
                <button class="red">Xem thêm</button>
            </div>
            <div class="block filmEarly">
                <!-- -------------------------MOVIES------------------------------->
    <?php 
        if(!empty($data['listMoviesEarly'])){
            while($row = mysqli_fetch_array($data['listMoviesEarly'])){
                ?>
                    <div class="items items-film">
                        <div class="img">
                            <img src="<?= $row['poster'] ?>" alt="">
                            <div class="block-playbtn">
                            <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="details-film ss">
                            <p class="name-film"><?= $row['name'] ?></p>
                            <p class="type-film" ><?= $row['genre'] ?></p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p class="price"><?= $row['purchase'] ?> <u>đ</u> </p>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
                <!-- --------------------------------------------------------- -->
            </div> <!--end filmEarly -->
        </div> <!--end item-container -->
            


        <div class="item-container">
            <div class="container-title">
                <p>Sách bán chạy nhất</p>
                <button class="blue">Xem thêm</button>
            </div>
            <div class="block bookBestSale">
                <!-- ---------------------------BOOK--------------------------- -->
    <?php 
        if(!empty($data['listBooks'])){
            while($row = mysqli_fetch_array($data['listBooks'])){
                ?>
                    <div class="items items-book">
                        <div class="img">
                            <img src="<?= $row['poster'] ?>" alt="">
                        </div>
                        <div class="details-book">
                            <p class="name-book"><?= $row['name'] ?></p>
                            <p class="actor" ><?= $row['author'] ?></p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p class="price"><?= $row['purchase'] ?> <u>đ</u> </p>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
                <!-- --------------------------------------------------------- -->
            </div> <!--end bookBestSale -->
        </div> <!--end item-container -->


        
        <div class="item-container">
            <div class="container-title">
                <p>Lượt tải cao nhất</p>
                <button class="green">Xem thêm</button>
            </div>
            <div class="block appBestDown block-app">
                <!-- -------------------------APP------------------------------ -->
    <?php 
        if(!empty($data['listApps'])){
            while($row = mysqli_fetch_array($data['listApps'])){
                ?>
                    <div class="items items-app">
                        <img src="<?= $row['poster'] ?>" alt="">
                        <div class="details-app">
                            <p class="name-app"><?= $row['name'] ?></p>
                            <p class="producer" ><?= $row['producer'] ?></p>
                        </div>
                        <div class="evaluate-price">
                            <div class="evaluate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <?php if($row['price']==0){
                                ?><p class="price">Free</p> <?php
                            } ?>
                            <?php if($row['price']!=0){
                                ?><p class="price"><?= $row['price'] ?> <u>đ</u></p> <?php
                            } ?>
                            
                        </div>
                    </div>
                <?php
            }
        }
    ?>
                <!-- --------------------------------------------------------- -->
            </div> <!--end appBestDown -->
        </div> <!--end container item -->
    </section> <!--end container -->
</div>

<script src="/demoGooglePlay/public/js/js_store1.js"></script>
<script src="/demoGooglePlay/public/js/checkValidator.js"></script>
</body>
</html>