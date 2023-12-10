<?php 
    include_once "../models/UserDAO.php";
   
    $user = new User();
    $user->setTitle($_POST['username']);
    $user->setContent($_POST['email']);
    $user->setPublicationDate($_POST['passwd']);
    $user->setUserID($_POST['lastname']);
    $user->setFirstname($_POST['firstname']);
    $user->setUrole($_POST['urole']);
    $userDAO = new UserDAO();
    $userDAO->addUser($user);
?>