<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



  session_start();

  if(!isset($_SESSION['userid'])){
      $hint = "We are sorry please login first!";
      require_once 'twig/lib/Twig/Autoloader.php';
      Twig_Autoloader::register();
      $loader = new Twig_Loader_Filesystem('templates');
      $twig = new Twig_Environment($loader);
      echo $twig->render('error.twig',array('words'=>$hint));
  }
  
  
  
  
  
  else{
    require("rb.php");
    $user="root";
    R::setup("mysql:host=localhost;dbname=music",$user,"");
    
         //upload jazz music
         if(isset($_POST['name']))
             { 
               $jname = $_POST['name'];
               $jurl = $_POST['url'];
               $jimages = $_POST['images'];
               $jsinger = $_POST['singer'];
               $jinfo = $_POST['info'];
               $music = R::dispense("jazz");
               $music->name = $jname;
               $music->url = $jurl;
               $music->images = $jimages;
               $music->singer = $jsinger;
               $music->info = $jinfo;
               $storeinfo = R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');
              }
            
              
              //upload pop music
            elseif(isset ($_POST['pname']))
            {
               $pname = $_POST['pname'];
               $purl = $_POST['purl'];
               $pimages = $_POST['pimages'];
               $psinger = $_POST['psinger'];
               $pinfo = $_POST['pinfo'];    
               $music = R::dispense("pop");
               $music->name=$pname;
               $music->url=$purl;
               $music->images=$pimages;
               $music->singer=$psinger;
               $music->info=$pinfo;
               $storeinfo=R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');
           }
           
           
           //upload classical music
           elseif (isset ($_POST['cname'])) 
            {
               $cname = $_POST['cname'];
               $curl = $_POST['curl'];
               $cimages = $_POST['cimages'];
               $csinger = $_POST['csinger'];
               $cinfo = $_POST['cinfo'];
               $music = R::dispense("classic");
               $music->name=$cname;
               $music->url=$curl;
               $music->images=$cimages;
               $music->singer=$csinger;
               $music->info=$cinfo;
              $storeinfo=R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');

           }
           
           
           //upload rock music
           elseif(isset($_POST['rname']))
          {
               $rname = $_POST['rname'];
               $rurl = $_POST['rurl'];
               $rimages = $_POST['rimages'];
               $rsinger = $_POST['rsinger'];
               $rinfo = $_POST['rinfo'];
               $music = R::dispense("rock");
               $music->name = $rname;
               $music->url = $rurl;
               $music->images = $rimages;
               $music->singer = $rsinger;
               $music->info = $rinfo;
               $storeinfo = R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');

           }
           
           
           //upload blues music
           elseif (isset($_POST['bname'])) 
               
           {
               $bname = $_POST['bname'];
               $burl = $_POST['burl'];
               $bimages = $_POST['bimages'];
               $bsinger = $_POST['bsinger'];
               $binfo = $_POST['binfo'];
               $music = R::dispense("blues");
               $music->name = $bname;
               $music->url = $burl;
               $music->images = $bimages;
               $music->singer = $bsinger;
               $music->info = $binfo;
               $storeinfo = R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');

           }
           
           
           //upload country music
           elseif (isset($_POST['coname']))
          {
               $coname = $_POST['coname'];
               $courl = $_POST['courl'];
               $coimages = $_POST['coimages'];
               $cosinger = $_POST['cosinger'];
               $coinfo = $_POST['coinfo'];
               $music = R::dispense("country");
               $music->name = $coname;
               $music->url = $courl;
               $music->images = $coimages;
               $music->singer = $cosinger;
               $music->info = $coinfo;
               $storeinfo = R::store($music);
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');
    
    
           }
           
           
           //if nothing found return to the upload page
           else
          {
               require_once 'twig/lib/Twig/Autoloader.php';
               Twig_Autoloader::register();
               $loader = new Twig_Loader_Filesystem('templates');
               $twig = new Twig_Environment($loader);
               echo $twig->render('upload.twig');
           }
 

  }
  



?>