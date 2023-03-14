<?php

require 'define.php';
require 'config.php';

if(isset($_POST['post'])) {
   $title = $_POST['title'];
   $article = $_POST['article'];

   // generate to create slug
   strtolower($title);
   $title = preg_replace('/[^a-zA-Z0-9]/', '-', $title);
   $title = trim($title, '-');
   $title = preg_replace('/-+/', '-', $title);

   // action import to database
   $query = "INSERT INTO tb_posts VALUES(
     NULL,
     '$title',
     '$article'
   )";

   mysqli_query($conn, $query);

   $return = mysqli_affected_rows($conn);

   if($return == true) {
    echo "<script>alert('berhasil di post!')</script>";
   } else {
    echo "<script>alert('gagal di post!')</script>";
   }




}




?>



<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Posting Artikel</title>

 <!-- style -->
 <style>
  .article {
   margin-top: 10px;
  }
  .btn-post {
   margin-top: 10px;
  }
 </style>

</head>
<body>
 <h1>Posting Artikel</h1>
 <a href="<?= base_url ?>
 ">Kembali</a>
 <br>
 <?php
  if(!isset($_POST['post'])) {
   echo"Slug belum jadi";
  } else {
   echo "Slug : ".$title;
  }
 ?>
 <hr>
 <form action="" method="post">
  <label for="title">Title</label>
  <input type="text" autocomplete="on" id="title" name="title">
  <br>
  <div class="article">
  <label for="article">Article</label>
  <textarea name="article" autocomplete="on" id="" cols="30" name="article" rows="10"></textarea>
  </div>
  <button type="submit" class="btn-post" name="post">Posting</button>
 </form>
</body>
</html>