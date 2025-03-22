
<?php
session_start();
require("db.php");

date_default_timezone_set("asia/tehran");
$date1= date("y-m-d h:i");


if(isset($_GET['del'])){
$book_del_id=$_GET['del'];


$sql=mysqli_query($db,"update books set del='1' where id='$book_del_id'");

}

if(isset($_GET['bookname'])){
  $bookname=$_GET['bookname'];
  $booktedad=$_GET['booktedad'];
  $booksal=$_GET['booksal'];

    
  $sql=mysqli_query($db," insert into books (`book_name` , `book_pages` , `book_year`) values ('$bookname','$booktedad','$booksal') ");
  
  }
  

?>





<html>
    <head>
<meta name="viewport" content="width=device-with, initial-scale=1.0">
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="test.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: yellow;
}
</style>
    </head>

    <body style="background-image: url('ss.jpg'); background-size: cover;"> 


<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">اضافه کردن کتاب</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <form action="home.php" method="get">

      <div class="modal-body">
        
      <label for="bookname" class="form-label"> نام کتاب</label>
      <input id="bookname" name="bookname" class="form-control">
      <br>
      <label for="booktedad" class="form-label">  تعداد صفحه</label>
      <input id="booktedad" name="booktedad" class="form-control">
      <br>
      <label for="booksal" class="form-label"> سال چاپ </label>
      <input id="booksal" name="booksal" class="form-control">
      <br>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="submit" class="btn btn-success"> ثبت کتاب</button>
      </div>


      </form>




    </div>
  </div>
</div>






    <ul style="box-shadow: 0px 0px 25px 0px rgb(255, 255, 255); border-radius: 10px;">
  <li><a href="logout.php">خروج</a></li>
  <li><a class="active" href="#"><?php echo $date1 ?></a></li>

</ul>
<br>

<div style="text-align:center;">
    <?php echo $_COOKIE['user'] ?>
<h1>welcome to home </h1>
</div>
<br>


<div>
</div>



<div style="text-align:center" class="div_table">
  <h2>
    لیست کتاب ها
</h2>
<br>

  <table dir="rtl" class="table table-striped table-dark table1">
    <thead>
    <tr>

     <th>
       ردیف
     </th>
     <th>
       نام کتاب
     </th>
     <th>
       تعداد صفحه
     </th>
     <th>
       سال چاپ
     </th>
     <th style="width:25%;">
        مدیریت کتاب ها 
     </th>


     </tr> 

    </thead>
    <tbody>

    <?php

$sql=mysqli_query($db, "select * from books where del='0'");

$i=0;

while($row=mysqli_fetch_assoc($sql)){

  $book_name=$row['book_name'];
  $book_pages=$row['book_pages'];
  $book_year=$row['book_year'];
  $book_id=$row['id'];

  $i=$i+1;

  echo "
      <tr>
      
      <td>
        $i
      </td>
      <td>
        $book_name
      </td>
      <td>
        $book_pages
      </td>
      <td>
        $book_year
      </td>
            <td>

        <button class=\" btn btn-success \" style=\"font-size:13px;\" data-bs-toggle=\"modal\" data-bs-target=\"#modal1\">
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-plus-square\" viewBox=\"0 0 16 16\">
  <path d=\"M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z\"/>
  <path d=\"M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4\"/>
</svg> اضافه کردن
        </button>



        <a href=\"home.php?del=$book_id\">    
        <button class=\" btn btn-danger \" style=\"font-size:13px;\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash3-fill\" viewBox=\"0 0 16 16\">
  <path d=\"M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5\"/>
</svg> حذف
        </button>
        </a>
      </td>

 
      </tr> 
  ";
}

?>



    </tbody>
  </table>
</div>
    </body>
</html>