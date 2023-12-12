<?php

    class UserList implements ControllerAction{

        function processGET(){
            $userDAO = new UserDAO();
            $users = $userDAO->getUsers();
            $_REQUEST['users']=$users;
            return "views/listUsers.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class UserAdd implements ControllerAction{

        function processGET(){
            return "views/addUser.php";
        }

        function processPOST(){
            $username = $_POST['username'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $passwd = $_POST['passwd'];
            $urole = $_POST['urole'];

            $user = new User();
            $user->setUsername($username);
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setEmail($email);
            $user->setPasswd($passwd);
            $user->setUrole($urole);

            $userDAO = new UserDAO();
            $userDAO->addUser($user);

            header("Location: controller.php?page=list");
            exit;
        }


        function getAccess(){
            return "PROTECTED";
        }      

    }


    class UserUpdate implements ControllerAction{

        function processGET(){
            return "views/userForm.php";
        }

        function processPOST(){
            $userID=intval($_POST["userID"]);
            $username=$_POST['username'];
            $lastname=$_POST['lastname'];
            $firstname=$_POST['firstname'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $urole=$_POST['urole'];
            $user = new User();
            $user->setUserID($userID);
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPasswd($passwd);
            $user->setUserID($lastname);
            $user->setFirstname($firstname);
            $user->setUrole($urole);
            $userDAO = new UserDAO();
            $userDAO->updateUser($user);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class UserDelete implements ControllerAction{

        function processGET(){
            $userID = $_GET['userID'];
            return 'views/delUser.php';

        }

        function processPOST(){
            $userid=$_POST['userID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $userDAO = new UserDAO();
                $userDAO->deleteUser($userid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $userDAO = new UserDAO();
            $found=$userDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
                $_SESSION['role']=$found['urole'];
                $_SESSION['userID']=$found['userID'];
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }

    }
    class Home implements ControllerAction{

        function processGET(){
            $userDAO = new UserDAO();
            $posts = $userDAO->getPosts();
            $_REQUEST['posts']=$posts;
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }
    }


    class Post implements ControllerAction{
        public $postID;
        public $title;
        public $content;
        public $publicationDate;
        public $userID;

        function processGET(){
            $postID = $_GET['postID'];
            $userDAO = new UserDAO();

            $post = $userDAO->getPost($postID);
            $title = $post->title;
            $content = $post->content;
            $publicationDate = $post->publicationDate;
            $userID = $post->userID;

            $_REQUEST['title']=$title;
            $_REQUEST['content']=$content;
            $_REQUEST['publicationDate']=$publicationDate;
            $_REQUEST['userID']=$userID;

            return "views/post.php";
        }

        function processPOST(){
            $postID = $_POST['postID'];
            $_REQUEST['postID']=$postID;
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

        function load($row)
        {
            $this->postID = $row['postID'];
            $this->title = $row['title'];
            $this->content = $row['content'];
            $this->publicationDate = $row['publication_date'];
            $this->userID = $row['userID'];
        }
    }

    class NewPost implements ControllerAction{
        function processGET(){
            return "views/newpost.php";
        }

        function processPOST(){
            $post = new Post();
            $post->title = $_POST['title'];
            $post->content = $_POST['content'];
            $post->publicationDate = date("Y-m-d H:i:s");
            $post->userID = ($_SESSION['userID']);

            $userDAO = new UserDAO();
            $userDAO->addPost($post);

            echo '<script>alert("Post Added Successfully")</script>';
            header("Location: controller.php?page=home");
            exit;
        }

        function getAccess(){
            return "PUBLIC";
        }
    }
?>