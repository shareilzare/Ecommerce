<?php

$db = mysqli_connect('localhost','root','','ecommercedb');

mysqli_query($db,"SET time_zone = '+3:30'");
mysqli_query($db,"SET CHARACTER SET utf8");
mysqli_query($db,"SET NAMES utf8_persian_ci");
mysqli_query($db,"SET character_set_connection = 'utf8'");
mysqli_query($db,"SET NAMES utf8");
mysqli_set_charset($db, 'utf8');
date_default_timezone_set('Asia/Tehran');


?>