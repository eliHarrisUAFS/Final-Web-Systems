<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/UserControllers.php";
    include_once "models/UserDAO.php";


    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(0);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            //***** 1. Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'];
            if(isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            }
            else {
                $page = "home";
            }
        
            //***** 2. Route the Request to the Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            
            //** 3. Check Security Access ***/
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
        /******************************************************
         * Register the Controllers with the Front Controller *
         ******************************************************/
            $controllers["GET"."list"] = new UserList();
            $controllers["GET"."add"] = new UserAdd();
            $controllers["POST"."add"] = new UserAdd();
            $controllers["GET"."update"] = new UserUpdate();
            $controllers["POST"."update"] = new UserUpdate();
            $controllers["GET"."delete"] = new UserDelete();
            $controllers["POST"."delete"] = new UserDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();
            $controllers["GET"."home"] = new Home();
            $controllers["GET"."about"] = new About();
            $controllers["GET"."post"] = new Post();
            $controllers["POST"."post"] = new Post();
            $controllers["GET"."newpost"] = new NewPost();
            $controllers["POST"."newpost"] = new NewPost();
            $controllers["GET"."updatepost"] = new UpdatePost();
            $controllers["POST"."updatepost"] = new UpdatePost();
            $controllers["GET"."update"] = new UserUpdate();
            $controllers["POST"."update"] = new UserUpdate();

            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>