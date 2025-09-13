<?php 
      require_once "app/Login.php";
      $page = 'login';
      
      if (isset($_GET['param'])) {
        $a = new App\Login();
        $a->login();
      }else{
        session_start();
        $b = new App\Login();
        $b->logout();
        
            header("location: login.php");
        	
      }
      
  ?>