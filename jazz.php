<?php




/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//connect the database find the record we want



    
    
   require("rb.php");
   $user = "root";
   R::setup("mysql:host=localhost;dbname=music",$user,"");
   $jazz = R::findAll('jazz');
   
   
   //find the info you want
   $jname = array();
   $jurl = array();
   $jimages = array();
   $jsinger = array();
   
   foreach ($jazz as $key)
   {
       
     $jname[] = $key->name;
     $jurl[] = $key->url;
     $jimages[] = $key->images;
     $jsinger[] = $key->singer;

   }

   
//find special music info
   $sname = array();
   $sinfo = array();
   $surl = array();
   $simages = array();
   $ssinger = array();
   $sjazz = R::findAll('jazz','ORDER BY id DESC');
   foreach ($sjazz as $key){
       
     $sname[] = $key->name;
     $surl[] = $key->url;
     $simages[] = $key->images;
     $sinfo[] = $key->info;
     $ssinger[] = $key->singer;

   }
   
   
   

//load the templates
 
  require_once 'twig/lib/Twig/Autoloader.php';
  Twig_Autoloader::register();
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  $helloworld ="Jazz";
  $blues2 ='active'; 
  echo $twig->render('music.twig',  array('musickind'=>$helloworld, 'jazz'=>$blues2,'musicurl'=>$jurl,'picurl'=>$jimages,'songname'=>$jname,
                                           'name'=>$sname,'url'=>$surl,'info'=>$sinfo,'pic'=>$simages,'singer'=>$jsinger,'ssinger'=>$ssinger)); 

?>

