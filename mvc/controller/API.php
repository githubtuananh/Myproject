<?php 
    // header('Access-Control-Allow-Origin:*');
    // header('Content-Type: application/json');

class controllerAPI extends controller{
        protected $gClient;
        protected $modelApps;
        protected $modelMovies;
        protected $modelBooks;
        protected $modelsAccount;
        
        public function __construct(){
            $this->modelsAccount = $this->model('Account');
            $this->modelMovies = $this->model('Movies');
            $this->modelBooks = $this->model('Books');
            $this->modelApps = $this->model('Apps');
        }
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


        //Xử lý login bằng google
        public function loginGoogle(){
            require_once('library/google-api/vendor/autoload.php');
            $this->gClient = new Google_Client();
            $this->gClient->setClientId("903539573601-srfa3smq0jnn9ifmtf5ocfnvval3j2q6.apps.googleusercontent.com");
            $this->gClient->setClientSecret("tpeHMSq_9QiVCdixQPv9vKYM");
            $this->gClient->setApplicationName("Vicode Media Login");
            $this->gClient->setRedirectUri("http://localhost:8888/demoGooglePlay/API/handleLoginByGoogle");
            // $this->gClient->setRedirectUri("http://demoproductstore.epizy.com/demoGooglePlay/API/handleLoginByGoogle");        
            
            $this->gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
            $login_url = $this->gClient->createAuthUrl();
            echo $login_url;
            return $this->gClient;

            
        }
        public function handleLoginByGoogle(){
            $this->gClient = $this->loginGoogle();
            $url = explode('?code=',trim($this->getCurURL()));
            $code = $url[1];
            $code = urldecode($code);
            if (!empty($code)) {
                $token = $this->gClient->fetchAccessTokenWithAuthCode($code);
                if(!isset($token["error"]) && ($token["error"] != "invalid_grant")){
                    $oAuth = new Google_Service_Oauth2($this->gClient);
                    $userData = $oAuth->userinfo_v2_me->get();
                    
                    $name =  $userData['givenName'] .' '. $userData['familyName'] ;
                    $email = $userData['email'];
                    $avatar = $userData['picture'];
                    $result = $this->modelsAccount->insertAccount($name,$email,$avatar);
                    
                    header('location: /demoGooglePlay/store');
                }
                else{
                    header('location: /demoGooglePlay/store');
                }
            }else{
                header('Location: /demoGooglePlay/store');
                exit();
            } 
        }
        
        //Xử lý login bằng facebook
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

        //Lấy url hiện tại
        function getCurURL(){
            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                $pageURL = "https://";
            } else {
                $pageURL = 'http://';
            }
            if(isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            }else{
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }

        //Đăng xuất
        public function logout(){
            session_destroy();
            setcookie('user', '', time() - 60*60, '/'); 
            header('location: /demoGooglePlay/store');
            die();
        }

        public function url(){
            // echo $_GET['test'];
            // $url = 'http://localhost:8888/demoGooglePlay/API/url/asd?test=123';
            // $url = explode('/',trim($url));
            // print_r($url);
            // echo $_GET['test'];
        }
    }
?>