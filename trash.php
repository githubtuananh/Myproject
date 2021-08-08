<h1>asdasdasd</h1>
<?php 
//Xem thông tin phim
public function Readmovies(){
    $movie = [];
    $movie['film'] = [];
    $film = $this->modelMovies->getMoviesEarly();
    while($row = mysqli_fetch_array($film)){
        $t = array(
            'idFilm' => $row['idFilm'],
            'name' => $row['name'],
            'genre' => $row['genre'],
            'purchase' => $row['purchase'],
            'poster' => $row['poster'],
        );
        array_push($movie['film'],$t);
    }
    echo json_encode($movie);
}

//show thông tin phim theo id
public function show($id){
    $movie = [];
    $movie['film'] = [];
    $film = $this->modelMovies->showMovies($id);
    while($row = mysqli_fetch_array($film)){
        $t = array(
            'idFilm' => $row['idFilm'],
            'name' => $row['name'],
            'genre' => $row['genre'],
            'purchase' => $row['purchase'],
            'poster' => $row['poster'],
        );
        array_push($movie['film'],$t);
    }
    echo json_encode($movie);
}
?>
public function url(){
             echo $_GET['test'];
             $url = 'http://localhost:8888/demoGooglePlay/API/url/asd?test=123';
             $url = explode('/',trim($url));
             print_r($url);
             echo $_GET['test'];
        }

Xử lý login bằng facebook
        public function loginFacebook(){
            require_once('library/facebook-api/vendor/autoload.php');
            $fbObject = new \Facebook\Facebook([
                'app_id' => '574504283546541',
                'app_secret' => '40cd519574e75cebdb47657d2219a81d',
                'default_graph__version' => 'v2.5',
            ]);
            $helper = $fbObject->getRedirectLoginHelper();
            $redirectTo = "http://localhost:8888/demoGooglePlay/API/handleLoginByFacebook";
            $email=['email'];
            $fullURL = $helper->getLoginUrl($redirectTo,$email);
            echo $fullURL;
            return [$fbObject, $helper];
        }


// public function store(){
        //     $this->views = $this->view('MasterLayout/storeMain'
        //     ,[  
        //         'viewComputer' => $this->view('MasterLayout/storeComputer',[
        //             'listMoviesBestSale' => $this->modelMovies->getMoviesBestSale(),
        //             'listMoviesEarly' => $this->modelMovies->getMoviesEarly(),
        //             'listBooks' => $this->modelBooks->getBooks(),
        //             'listApps' => $this->modelApps->getApps(),
        //         ]),

        //         // ----------------------------------------------------
        //         'viewMobile' => $this->view('MasterLayout/storeMobile',[
        //             'listMoviesBestSaleMb' => $this->modelMovies->getMoviesBestSaleMb(),
        //             'listMoviesEarlyMb' => $this->modelMovies->getMoviesEarlyMb(),
        //             'listBookBestSalesMb' => $this->modelBooks->getBookBestSaleMb(),
        //             'listAppsBestDownMb' => $this->modelApps->getAppBestDownMb(),
        //         ])
        //     ]);
        // }
<?php 
//goi thu vien
require_once('library/PHPMailer-5.2.26/class.smtp.php');
require_once('library/PHPMailer-5.2.26/class.phpmailer.php'); 
require_once('library/VerifyEmail/VerifyEmail.class.php'); 
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
    $nFrom = 'Freetuts.net';
    $mFrom = 'tuananh0398547674@gmail.com';  //dia chi email cua ban 
    $mPass = 'tuaN13032001';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}

require_once('library/PHPMailer-5.2.26/class.smtp.php');
require_once('library/PHPMailer-5.2.26/class.phpmailer.php'); 
require_once('library/VerifyEmail/VerifyEmail.class.php'); 
// Initialize library class
$mail = new VerifyEmail();

// Set the timeout value on stream
$mail->setStreamTimeoutWait(20);

// Set debug output mode
$mail->Debug= TRUE; 
$mail->Debugoutput= 'html'; 

// Set email address for SMTP request
$mail->setEmailFrom('from@email.com');

// Email to check
$email = '1303letuanandd@gmail.com'; 

// Check if email is valid and exist
if($mail->check($email)){ 
    echo 'Email &lt;'.$email.'&gt; is exist!'; 
}elseif(verifyEmail::validate($email)){ 
    echo 'Email &lt;'.$email.'&gt; is valid, but not exist!'; 
}else{ 
    echo 'Email &lt;'.$email.'&gt; is not valid and not exist!'; 
} 


// $title = 'Hướng dẫn gửi mail bằng phpmailer';
//     $content = 'le tuan anh xuyen chet dinh dinh dandddddddg';
//     $nTo = 'letuananh';
//     $mTo = 'tuananh0398547674@gmail.com';
//     $diachicc = '1303letuananh@gmail.com';
//     //test gui mail
//     $mail = sendMail($title, $content, $nTo, $mTo,$diachicc);
//     if($mail==1)
//     echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
//     else echo 'Co loi!';




                  if(!empty($data['data'])){
                    $row = mysqli_fetch_array($data['data']);
                    $username = $row['email'];
                    echo  $username;
                }

                
?>
<form action="" method = "POST" enctype = "multipart/form-data">
    <input type="file" name="up-file">
    <input type="submit" name="submit" value="ok">
</form>

<?php 
    var_dump( $_FILES);
    move_uploaded_file($_FILES['up-file']['tmp_name'],'public/'.$_FILES['up-file']['name']);
    $url = 'public/'.$_FILES['up-file']['name'];
    echo $url;
?>
<img src="<?php echo $url ?>" alt="">







-------------------------------------------------------------
public function getMoviesBestSale(){
            echo '
            <div class="item-container">
            <div class="container-title">
                <p>Phim bán chạy nhất</p>
                <button class="btn-filmBestSale red">Xem thêm</button>
            </div>
            <div class="block filmBestSale">';
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
        public function getMoviesBestEarly(){
            echo '
            <div class="item-container">
            <div class="container-title">
                <p>Phim mới ra mắt</p>
                <button class="btn-filmEarly red">Xem thêm</button>
            </div>
            <div class="block filmEarly">';
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
        public function getBookBestSale(){
            echo '
            <div class="item-container">
            <div class="container-title">
                <p>Sách bán chạy nhất</p>
                <button class="btn-bookBestSale blue">Xem thêm</button>
            </div>
            <div class="block bookBestSale">';
            $books= $this->modelBooks->getBooks();
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
        public function getAppBestDown(){
            echo '
            <div class="item-container">
            <div class="container-title">
                <p>Lượt tải cao nhất</p>
                <button class="btn-appBestDown green">Xem thêm</button>
            </div>
            <div class="block appBestDown block-app">';
            $apps= $this->modelApps->getApps();
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