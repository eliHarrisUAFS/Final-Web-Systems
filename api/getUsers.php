<?php 
   include_once "../models/UserDAO.php";

   $userDAO = new UserDAO();
   $posts = $userDAO->getUsers();

   echo json_encode($users);
?>