<?php


  session_start();
  
  require_once 'twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  
  
  //logout
  if($_GET['action'] == "logout")
  {
      
      unset($_SESSION['username']);
      unset($_SESSION['userid']);
      echo $twig->render('jump.twig');
      
  }


//if the username input is empty, it will jumps to the error page
  if(!isset($_POST['username']))
  {
      $hint="We are sorry please login first!";
      require_once 'twig/lib/Twig/Autoloader.php';
      Twig_Autoloader::register();
      $loader = new Twig_Loader_Filesystem('templates');
      $twig = new Twig_Environment($loader);
      echo $twig->render('error.twig',array('words'=>$hint));
  }
  
   
  //get the info from database
  $username = $_POST['username'];
  $password = $_POST['password'];
  require("rb.php");
  $user = "root";
  R::setup("mysql:host=localhost;dbname=music",$user,"");
  $admin = R::findOne('user');
  $dataPassword = $admin->password;
  $datauserid = $admin->id;
  
  if($password == $dataPassword)
  {
      
      $_SESSION['username']=$username;
      $_SESSION['userid']=$datauserid;
      echo $twig->render('upload.twig');
      
  }
  else
  {
      $hint= 'We are sorry; wrong Password !';
      echo $twig->render('error.twig',array('words'=>$hint));
  }
  







?>