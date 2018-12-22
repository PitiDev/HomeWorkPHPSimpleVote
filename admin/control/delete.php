<?php

require '../dbconnect.php';

$id = $_GET ['id'];

$sql = " DELETE FROM photo WHERE id = '$id'";
$result = mysqli_query($DBcon, $sql);

if ($result) {
	header("location: ../home.php");
}
else{

	echo "ລົບບໍ່ໄດ້". mysqli_error($DBcon);
}

mysqli_close($DBcon);

 ?>
