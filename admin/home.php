<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" href="../css/bootstrap.css"> 
	<link rel="stylesheet" href="lao/style.css" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
  header("Location: index.php");
}

// $query = $DBcon->query("SELECT * FROM admin WHERE user_id=".$_SESSION['userSession']);
// $userRow=$query->fetch_array();
// $DBcon->close();

?>

<section style="margin-bottom:50px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h2 class="text-center">Post ຮູບພາບ: </h2>
            <hr width="50%">
            <div class="row justify-content-center">
              <div class="col-md-4">
                  <form action="control/vote.php" method="post" enctype="multipart/form-data">
                    <label for="">ຊື່ຮູບ</label>
                    <input type="text" name="name" class="form-control" required placeholder="ຊື່ຮູບ">
                    <br>
                    <label for="">ຮູບພາບ</label>
                    <input type="file" name="img" class="form-control">
                    <input type="text" name="score" class="invisible" value="0">
                    <br>
                    <button type="submit" class="btn btn-info btn-lg"><i class="fas fa-file-upload"></i>  ອັບໂຫຼດຮູບ</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row" style="margin-top:20px;">

   <?php
        $result = "SELECT * FROM `photo`";
        $query = mysqli_query($DBcon, $result);
        $rows=0;
        if($query->num_rows > 0 ){
          while($row = $query->fetch_array()) {
            if ($rows == 0){
                echo "";
             }
        ?>


      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top" src="<?php echo "../img/".$row["photo"]; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row["photo_name"]; ?></h5>
            <h5 class=""><b><i class="fas fa-poll"></i>  ຄະແນນໂຫວດ:
              <?php echo $row["score"]; ?>
            </b></h5>
            <a href="control/delete.php? id=<?php echo $row["id"]; ?>" class="btn btn-danger" style="float: right"><i class="fas fa-trash"></i></a>
          </div>
        </div>
      </div>

<?php
  if($rows == 3){
       echo '';
       $rows = -1;
    }
    $rows++; ?>
  <?php } }
  ?>


    </div>


  </div>
</section>


<style>
	body{
	background:#f9f9f9;
}
a{
	color: #ffffff;
}
a:hover{
	color: #ffffff;
}

.card {
    margin: 0 auto;
    margin-top: 10px;
    background-color: #fff;
  
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
      
  font-family:Tahoma, Geneva, sans-serif;
  color:#00695C;
  font-weight:lighter;
}
</style>
</body>
</html>