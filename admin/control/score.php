<?php

require '../dbconnect.php';

$id = $_POST['id'];
$photo_name = $_POST["photo_name"];
$score = $_POST['score'];

$query = "UPDATE photo SET photo_name='$photo_name',score='$score'WHERE id='$id'";

$result = mysqli_query($DBcon, $query);
if ($result) {
  header( 'Location: ../../index.php' );
}else {
  echo "ຜິດພາດ" .mysqli_error($DBcon);
}
mysqli_close($DBcon);



?>
