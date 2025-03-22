<?php
$db = mysqli_connect('localhost','root','','ecommercedb');


$user_db='';
$pass_db='';
$ok=false;
$error='-';

if(isset($_POST["user"])){


    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $mobile = $_POST["mobile"];

    if (substr($mobile,0,2) !='09'){
        $error='شماره صحیح نیست';
    }
    if (strlen($mobile)<11 || strlen($mobile)>11 ){
        $error='شماره را درست وارد کنید';
    }
    if (strlen($user)<5 || strlen($user)>50 ){
        $error='نام خود را درست وارد کنید';
    }




    

    if($error=='-'){


        mysqli_query($db,"insert into user (username , pass , mobile) values ('$user' , '$pass' , '$mobile'); ");

      
        }
      
   }


   ?>





<html>

<head>
<meta name="viewport" content="width=device-with, initial-scale=1.0">
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="test.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-image: url('ss.jpg'); background-size: cover;" >
<div class="kol">
    <br>
    <br>
    <br>
    <br>


<h1>register</h1>
<form method="post" action="reg.php">
<label>username:</label><br>
    <input type="text" name="user" class="input1"><br>
    <label>phone number:</label><br>
    <input type="tel" name="mobile" class="input1"><br>
    <label>password:</label><br>
    <input type="password" name="pass" class="input1"><br><br>
    <button class="btn btn-success" type="submit"> ثبت نام </button>
    <br>
    <br>
    <a href="index.php" style="text-decoration:none; color:white"> بازگشت</a>
    </form>

<div>

    <?php


if($error<>'-'){
    echo '
    <div class="alert alert-danger  text-center">
      '. $error .'
    </div>';
    }


    ?>
</div>

    </body>
    </html>


