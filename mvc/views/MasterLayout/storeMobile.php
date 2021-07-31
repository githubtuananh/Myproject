
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LE TUAN ANH</title>
</head>
<body>
    <!-- Xử lý thanh menu -->
    <div class="loader-mobile">
        <div class="block-loading">
            <lord-icon
                src="https://cdn.lordicon.com/tkuhvozl.json"
                trigger="loop"
                colors="primary:#ffffff,secondary:#ffffff"
                stroke="100"
                style="width:10rem;height:10rem">
            </lord-icon>
            <p style="color:#ffffff; font-size: 1.3rem"> Đang tải trang ...</p>
        </div>
    </div>
    <div class="nav-bar">
        <div class="nav-bar1">
            <p class="name-store">TUANANH</p>
            <div class="block-user">
                <div class="block-user1">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    <div class="slide-user">
                        <div class="content-user">
                            <?php 
                                if(!isset($_SESSION['login'])){
                                    ?>
                                        <p class="login mobile">Đăng nhập</p>
                                        <p class='register mobile'>Đăng kí</p>
                                    <?php
                                }
                                else{
                                    ?>
                                        <p class="account mobile"><?php echo $_SESSION['login']['name'] ?></p>
                                        <a href="/demoGooglePlay/API/logout" class='logout mobile'>Đăng xuất</a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
        <div class="slide-navbar">
            <!-- <a style="color:white; font-size:3rem" href="/demoGooglePlay/store">Trang chủ</a> -->
            <ul class=menu-mobile>
                <li class="item-search">
                    <div><i class="fa fa-search" aria-hidden="true"></i></i></div>
                    <p>Tìm kiếm</p>
                </li>
                <li class="item-home">
                    <div><i class="fa fa-home" aria-hidden="true"></i></div>
                    <p>Trang chủ</p>
                </li>
                <li class="item-app">
                    <div class="icon item1"><i class="fa fa-th-large" aria-hidden="true"></i></div>
                    <p>Ứng dụng</p>
                </li>
                <li class="item-film">
                    <div><i class="fa fa-film" aria-hidden="true"></i></div>
                    <p>Phim</p>
                </li>
                <li class="item-book">
                    <div><i class="fa fa-book" aria-hidden="true"></i></div>
                    <p>Sách</p>
                </li>
            </ul>
            <div class="menusub-mobile">
                <p class="faq">FAQ</p>
                <p class="setting">Cài đặt</p>
            </div>
        </div>
    </div>

            <!-- Xử lý phần thân chứa nội dụng -->
            <section class="container mobile">
        <div class="item-container">
            <div class="container-title">
                <p>Phim bán chạy nhất</p>
                <button class="btn-filmBestSale red">Xem thêm</button>
            </div>
            <div class="block filmBestSale">
                <!-- -------------------MOVIES-------------------------- -->
    <?php 
        if(!empty($data['listMoviesBestSaleMb'])){
            while($row = mysqli_fetch_array($data['listMoviesBestSaleMb'])){
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
                <button class="btn-filmEarly red">Xem thêm</button>
            </div>
            <div class="block filmEarly">
                <!-- -------------------------MOVIES------------------------------->
    <?php 
        if(!empty($data['listMoviesEarlyMb'])){
            while($row = mysqli_fetch_array($data['listMoviesEarlyMb'])){
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
                <button class="btn-bookBestSale blue">Xem thêm</button>
            </div>
            <div class="block bookBestSale">
                <!-- ---------------------------BOOK--------------------------- -->
    <?php 
        if(!empty($data['listBookBestSalesMb'])){
            while($row = mysqli_fetch_array($data['listBookBestSalesMb'])){
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
                <button class="btn-appBestDown green">Xem thêm</button>
            </div>
            <div class="block appBestDown block-app">
                <!-- -------------------------APP------------------------------ -->
    <?php 
        if(!empty($data['listAppsBestDownMb'])){
            while($row = mysqli_fetch_array($data['listAppsBestDownMb'])){
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
</body>
</html>