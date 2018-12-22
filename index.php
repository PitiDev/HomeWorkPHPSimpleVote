<!DOCTYPE html>
<html>
<head>
	<title>Vote</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="admin/lao/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php 
include_once 'admin/dbconnect.php';
 ?>
<body style="background-color: #FAFAFA;">
 <section style="margin-top:20px; margin-bottom:50px;">
 	<div class="container">
 		<div class="card">
 			<div class="card-body text-center">
 				<h2><b>ລະບົບໂຫວດຮູບພາບ</b></h2>
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
 			<div class="col-md-6">
 				<div class="card">
				  <img class="card-img-top" src="<?php echo "img/".$row["photo"]; ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $row["photo_name"]; ?></h5>
				    <h4 class=""><b><i class="fas fa-poll"></i> ຄະແນນໂຫວດ:
				    	<h1 style="color: #FF9800; font-size: 80px; margin-left:30px;">
				    		<b><?php echo $row["score"]; ?></b>
				    	</h1>
				    </b></h4>

				    <form id="ismForm" action="admin/control/score.php" method="post" style="margin-top:-110px;">
				    	<input  name="photo_name" type="text" value="<?php echo $row["photo_name"]; ?>" class="invisible">
				        <input  name="score" type="text" value="<?php echo $row["score"]+1; ?>" class="invisible">
				        <input  name="id" type="hidden" value="<?php echo $row["id"]; ?>" >
				    	<button id="submit-btn" style="float: right;"  type="submit" class="btn btn-info btn-lg"><i class="fas fa-heart"></i>  Vote</button>
				    </form>

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

<script type="text/javascript">
    function submitForm() { // submits form
        document.getElementById("ismForm").submit();
    }
    function btnSearchClick()
    {
        if (document.getElementById("ismForm")) {
            setTimeout("submitForm()", 5000); // set timout 
       }
    }
    </script>

 <style>
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