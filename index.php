<?php


session_start();


$user_db='';
$pass_db='';
$ok=false;


if(isset($_COOKIE['mobile']) && strlen($_COOKIE['mobile'])==11){
    echo '
    <meta http-equiv="refresh" content="0; url=home.php">
    ';
    die('');
}else{
    $_COOKIE['user']='';
    $_COOKIE['pass']='';
    
}




if(isset($_POST["user"])){

     
    $user = $_POST["user"];
    $pass = $_POST["pass"];

 for($i=0;$i<=2;$i++){

    $read1=fgets($file);

    $read2=explode(",",$read1);

    $user_db=$read2[0];
    $pass_db=$read2[1];


    if($user== $user_db && $pass== $pass_db){
        $ok=true;
        setcookie('user', $read2[0], time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('mobile', $read2[2], time() + (86400 * 30), "/"); // 86400 = 1 day


    
       }

 }


 fclose($file);
      
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


<h1>login</h1>
<label>username:</label><br>
    <input type="text" name="user" id="user" class="input1"><br>
  
    <label>password:</label><br>
    <input type="password" name="pass" id="pass" class="input1"><br><br>
    <button class="btn btn-primary" onclick="send()" id="btn_send"> ورود</button>
    <br>
    <br>
    <a href="reg.php" style="text-decoration:none; color:white"> ثبت نام </a>


    <div>

    <br>

    <div id="error1" class="alert alert-danger text-center" style="display: none;">
        نام کاربری یا رمز عبور اشتباه است
    </div>

    <div id="ok1" class="alert alert-success text-center" style="display: none;">
        شما با موفقیت وارد شدید
    </div>



    <?php


if($ok==true){


    echo'
    <meta http-equiv="refresh" content="1; url=home.php">';

    
    }


    ?>
</div>






<script>
function send() {
    document.getElementById("error1").style.display="none";
    document.getElementById("btn_send").disabled=true;
    document.getElementById("btn_send").textcontent="در حال پردازش";


    user=document.getElementById('user').value;
    pass=document.getElementById('pass').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         console.log( this.responseText );
         let ok = this.responseText;

         document.getElementById("btn_send").disabled=false;
         document.getElementById("btn_send").textcontent=" ورود ";


         if (ok=='1'){
            document.getElementById("error1").style.display="none";
            document.getElementById("ok1").style.display="block";
            window.location.assign("home.php");
         }

         if (ok=='0'){
            document.getElementById("error1").style.display="block";
            document.getElementById("ok1").style.display="none";
         }

      }
    };
    xmlhttp.open("GET", "ajax.php?user=" + user + "&pass=" +pass , true);
    xmlhttp.send();
  }

</script>





    </body>
    </html>


