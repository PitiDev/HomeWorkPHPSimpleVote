<?php

require '../dbconnect.php';

$photo_name = $_POST["name"];
$score = $_POST['score'];

$target_dir = "../../img/";
$photo = md5(basename($_FILES["img"]["name"]).microtime()).basename($_FILES["img"]["name"]);
$target_file = $target_dir.$photo;
$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image  " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if($uploadOk == 1){
	if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
//End Image Upload
    
	$query = "INSERT INTO `photo` (`id`, `photo_name`,`photo`,`score`) VALUES (NULL,'$photo_name','$photo','$score')";

	$result = mysqli_query($DBcon, $query);

	if ($result) {
		echo "ເພືີ່ມສຳເລັດ";
		header('Location: ../home.php');
		exit();
	}
	else{
		echo "ເພີ່ມບໍ່ໄດ້". mysqli_error($DBcon);
	}

}

?>
