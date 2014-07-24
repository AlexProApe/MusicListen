<?php


  //connect the database
  require("rb.php");
  $user = "root";
  R::setup("mysql:host=localhost;dbname=music",$user,"");
  $condition=$_POST['conditions'];
  $kind=$_POST['musicsearch'];
  
  
  //load the template
  require_once 'twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  
  
  
  //exec the queries
  $sql = "select * from $kind where name like '%$condition%'";
  $row = R::getAll($sql);
  
  
  
  //if get nomething from database return nothing.
  if($row == NULL){
      echo $twig->render('search.twig',array('musicsearch'=>$kind));
  }
  
  
  //if get something from database display the information
  else{
  $authors = R::convertToBeans("$kind", $row);     
  $sname = array();
  $simages = array();
  $surl = array();
  $helloworld = 'Music';
  
  
  //search the measic look through the database
  if(is_array($authors)){
     foreach ($authors as $key) {
       $tname = $key->name;
       $timages = $key->images;
       $turl = $key->url;
       $sname[] = $tname;
       $surl[] = $turl;
       $simages[] = $timages;
     }
      
      echo $twig->render('search.twig',array('musickind'=>$helloworld,'surl'=>$surl,'simages'=>$simages,'sname'=>$sname,'musicsearch'=>$kind));
     
  }
  else {
            echo $twig->render('search.twig',array('musicsearch'=>$kind));

  }

  }
  
   
  
    ?>
    