<?php
    class controllerStore extends controller{
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

        public function store(){
            $this->views = $this->view('MasterLayout/storeComputer',[
                'listMoviesBestSale' => $this->modelMovies->getMoviesBestSale(),
                'listMoviesEarly' => $this->modelMovies->getMoviesEarly(),
                'listBooks' => $this->modelBooks->getBooks(),
                'listApps' => $this->modelApps->getApps(),
                'viewMobile' => 'MasterLayout/storeMobile',
                'listMoviesBestSaleMb' => $this->modelMovies->getMoviesBestSaleMb(),
                'listMoviesEarlyMb' => $this->modelMovies->getMoviesEarlyMb(),
                'listBookBestSalesMb' => $this->modelBooks->getBookBestSaleMb(),
                'listAppsBestDownMb' => $this->modelApps->getAppBestDownMb(),
            ]);
        }

        public function apps(){
            $this->views = $this->view('MasterLayout/storeComputer',[
                'listMoviesBestSale' => $this->modelMovies->getMoviesBestSale(),
                'listMoviesEarly' => $this->modelMovies->getMoviesEarly(),
                'listBooks' => $this->modelBooks->getBooks(),
                'listApps' => $this->modelApps->getApps(),
                'viewMobile' => 'MasterLayout/storeMobile',
                'listMoviesBestSaleMb' => $this->modelMovies->getMoviesBestSaleMb(),
                'listMoviesEarlyMb' => $this->modelMovies->getMoviesEarlyMb(),
                'listBookBestSalesMb' => $this->modelBooks->getBookBestSaleMb(),
                'listAppsBestDownMb' => $this->modelApps->getAppBestDownMb(),
            ]);
        }

        public function login(){
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $this->modelsAccount->checkLogin($username,$password);
        }
        public function movies(){
            $this->views = $this->view('MasterLayout/storeMain');
        }
        public function books(){
            $this->views = $this->view('MasterLayout/storeMain');
        }
        public function account(){
        }


        


        public function download(){
            $filename=basename('nhi.jpg');
            $path = "downloadApplication/nhi.jpg";
            if(file_exists($path) && !empty($filename)){
                    header ("Cache-Control: public");
                    header ("Content-Description:File Transfer");
                    header ("Content-Disposition: attachment; filename=$filename");
                    header ("Content-Type: application/zip");
                    header ("Content-Transfer-Encoding: binary");
                    readfile($path);
                    exit;
            }
        }
    }
?>