<?php


$db = mysqli_connect('localhost','root','','ecommercedb');

mysqli_query($db,"SET time_zone = '+3:30'");
mysqli_query($db,"SET CHARACTER SET utf8");
mysqli_query($db,"SET NAMES utf8_persian_ci");
mysqli_query($db,"SET character_set_connection = 'utf8'");
mysqli_query($db,"SET NAMES utf8");
mysqli_set_charset($db, 'utf8');
date_default_timezone_set('Asia/Tehran');


$ok=false;



if(isset($_GET["user"])){

    $user=$_GET["user"];
    $pass=$_GET["pass"];

    $sql = mysqli_query($db , " select * from user where username='$user' and pass='$pass' ");

   if( $row = mysqli_fetch_assoc($sql)){
    $user=$row['username'];
    $mobile=$row['mobile'];

    $ok=true;
    setcookie('user', $user, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('mobile', $mobile, time() + (86400 * 30), "/"); // 86400 = 1 day


   }


 }





if($ok==true){
    echo '1';
     
}else{
    echo '0';
}




?>