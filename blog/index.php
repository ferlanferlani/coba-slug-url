
<?php
print_r($_SERVER);
require '../config.php';
$url = $_GET['title'];

$sql = "SELECT * FROM tb_posts WHERE title = '$url'";


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Post</title>
</head>
<body>
<?php

  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result)) { ?>

    <h2><?= str_replace('-', ' ', $row['title']) ?></a></h2>
    <p><?= $row['article']?></p>
    <hr>
  
  <?php }?>
</body>
</html>