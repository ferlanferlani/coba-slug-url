<?php
require 'define.php';
require 'config.php';

$sql = "SELECT * FROM tb_posts";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coba slug</title>
</head>
<body>
  <a href="<?= base_url?>post">Posting Artikel</a>
  <hr>
  <h1>Daftar postingan</h1>
  <hr>
  <?php

  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result)) { ?>

    <h2><a href="<?= base_url ?>blog/?title=<?= $row['title']?>"><?= str_replace('-', ' ', $row['title']) ?></a></h2>
    <p><?= $row['article']?></p>
    <hr>
  
  <?php }?>
</body>
</html>