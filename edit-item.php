<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');

	if(strlen($_SESSION['login'])==0)
	{	
		header('location:index.php');
	}
	else
	{
		// insert data into tblpostitem
		$editId = intval($_GET['id']);

		if(isset($_POST['submit']))
		{
			$userId=$_POST['userId'];
			// $productName=$_POST['productName'];
			$productName=$_POST['productName'];
			$usedYear=$_POST['usedYear'];
			$overview=$_POST['overview'];
			$totalPrice=$_POST['totalPrice'];
			$pricePerDay=$_POST['pricePerDay'];
			$value=$_POST['value'];
			$payPalBusinessAccount=$_POST['payPalBusinessAccount'];
			$contactNo=$_POST['contactNo'];
			
			$sell=$_POST['sell'];
			$rent=$_POST['rent'];
			$swap=$_POST['swap'];
			
			$vimage1=$_FILES["img1"]["name"];
			move_uploaded_file($_FILES["img1"]["tmp_name"],"img/itemImages/".$_FILES["img1"]["name"]);
			/* 
			$vimage1=$_FILES["img1"]["name"];
			$vimage2=$_FILES["img2"]["name"];
			$vimage3=$_FILES["img3"]["name"];
			$vimage4=$_FILES["img4"]["name"];
			$vimage5=$_FILES["img5"]["name"];

			move_uploaded_file($_FILES["img1"]["tmp_name"],"img/itemImages/".$_FILES["img1"]["name"]);
			move_uploaded_file($_FILES["img2"]["tmp_name"],"img/itemImages/".$_FILES["img2"]["name"]);
			move_uploaded_file($_FILES["img3"]["tmp_name"],"img/itemImages/".$_FILES["img3"]["name"]);
			move_uploaded_file($_FILES["img4"]["tmp_name"],"img/itemImages/".$_FILES["img4"]["name"]);
			move_uploaded_file($_FILES["img5"]["tmp_name"],"img/itemImages/".$_FILES["img5"]["name"]); */
			

			/* $sql="INSERT tblpostitem(user_id, productName,usedYear,overview,totalPrice,pricePerDay,value,payPalBusinessAccount,contactNo,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,sell,rent,swap)
			 VALUES(:userId,:productName,:usedYear,:overview,:totalPrice,:pricePerDay,:value,:payPalBusinessAccount,:contactNo,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:sell,:rent,:swap)"; */
/* 			 $sql=
			 	"UPDATE tblpostitem 
SET 
user_id = 7, productName = ":productName", usedYear = 9, overview = ":overview", totalPrice = 19, pricePerDay = 19, value = 19, payPalBusinessAccount = "payPalBusinessAccount@gmail.com", contactNo = "123123123123", Vimage1 = ":Vimage1", Vimage2 = ":Vimage2", Vimage3 = ":Vimage3", Vimage4 = ":Vimage4", Vimage5 = ":Vimage5", sell = 1, rent = 1, swap = 1 WHERE id=10"; */
			 
			/* $sql=
			 	"UPDATE tblpostitem
				 SET user_id = :user_id, 
				 productName = :productName
				 usedYear = :usedYear,
				 overview = :overview,

				 totalPrice = :totalPrice,
				 pricePerDay = :pricePerDay,
				 value = :value,
				 payPalBusinessAccount = :payPalBusinessAccount,
				 contactNo = :contactNo,
				 Vimage1 = :Vimage1,
				 Vimage2 = :Vimage2,
				 Vimage3 = :Vimage3,
				 Vimage4 = :Vimage4,
				 Vimage5 = :Vimage5,
				 sell = :sell,
				 rent = :rent,
				 swap = :swap
				 WHERE id=:editId";  */
			/*  $sql=
			 	"UPDATE tblpostitem
				 SET user_id = :user_id, 
				 productName = :productName
				 WHERE id=:editId"; */
				 $sql=
					"UPDATE tblpostitem
					SET
					productName = :productName,
					usedYear = :usedYear,
					overview = :overview,
					totalPrice = :totalPrice,
					pricePerDay = :pricePerDay,
					value = :value,
					payPalBusinessAccount = :payPalBusinessAccount,
				 	contactNo = :contactNo,
					Vimage1 = :Vimage1,
					sell = :sell,
					rent = :rent,
					swap = :swap
					WHERE id=:id";
			$query = $dbh->prepare($sql);
			
			$query->bindParam(':productName',$productName,PDO::PARAM_STR);
			$query->bindParam(':usedYear',$usedYear,PDO::PARAM_STR);
			$query->bindParam(':overview',$overview,PDO::PARAM_STR);
			$query->bindParam(':totalPrice',$totalPrice,PDO::PARAM_STR);
			$query->bindParam(':pricePerDay',$pricePerDay,PDO::PARAM_STR);
			$query->bindParam(':value',$value,PDO::PARAM_STR);
			$query->bindParam(':payPalBusinessAccount',$payPalBusinessAccount,PDO::PARAM_STR);
			$query->bindParam(':contactNo',$contactNo,PDO::PARAM_STR);
			$query->bindParam(':sell',$sell,PDO::PARAM_STR);
			$query->bindParam(':rent',$rent,PDO::PARAM_STR);
			$query->bindParam(':swap',$swap,PDO::PARAM_STR);
			
			$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
			/* $query->bindParam(':userId',$userId,PDO::PARAM_STR);
			$query->bindParam(':productName',$productName,PDO::PARAM_STR);
			$query->bindParam(':usedYear',$usedYear,PDO::PARAM_STR);
			$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
			$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
			$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
			$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
			*/
			// $query->bindParam(':editId',$editId,PDO::PARAM_STR);
			$query->bindParam(':id',$editId,PDO::PARAM_STR);
			
			$query->execute();

			// $msg="Item record updated successfully".$sql.$userId.$productName.$editId.$query->execute();
			// $msg="Item record updated successfully".$sql.$productName.$editId;
			$msg="Item record updated successfully";
			/* $lastInsertId = $dbh->lastInsertId();
			if($lastInsertId)
			{
				$msg="Item posted successfully";
			}
			else 
			{
				$error="Something went wrong. Please try again" . $userId . $sql;
			} */

		}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<!-- <title>Car Rental Portal | Post Item</title> -->
	<title>SellRentSwap System | Post Item</title>

	<!--  -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<!--  -->
	<!--Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<!--Custome Style -->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<!--OWL Carousel slider-->
	<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
	<!--slick-slider -->
	<link href="assets/css/slick.css" rel="stylesheet">
	<!--bootstrap-slider -->
	<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
	<!--FontAwesome Font Style -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- SWITCHER -->
	<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
			
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		.succWrap{
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
	</style>
</head>

<body>
	<!-- <h1><?= $id ?></h1> -->
	<!-- Start Switcher -->
	<?php include('includes/colorswitcher.php');?>
	<!-- /Switcher -->  

	<!--Header-->
	<?php include('includes/header.php');?>
	<!-- /Header --> 

	<!-- Body -->
	<br>
	<div class="ts-main-content" style="margin-top:10">
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
							<div class="text-center">
								<h2 class="">Edit Item</h2>
							</div>
							
							<!-- form 1( basic info ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>

											<!-- notification( htmlentities ) -->
											<?php 
												if($error){
													?>
													<div class="errorWrap">
														<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
													</div>
													<?php 
												} 
												if($msg){
													?>
													<div class="succWrap">
														<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
													</div>
													<?php
												}	
											?>

											<div class="panel-body">
											
											<?php
												$item_sql = "SELECT * FROM tblpostitem WHERE id=:id";        
												$item_query = $dbh->prepare($item_sql);
												$item_query->bindParam(':id', $editId, PDO::PARAM_STR);
												$item_query->execute();
												$item_results = $item_query->fetch();

												// security
												// $id = $item_results["user_id"];
												$productName = $item_results["productName"];
												$usedYear = $item_results["usedYear"];
												$overview = $item_results["overview"];
												$sell = $item_results["sell"];
												$rent = $item_results["rent"];
												$swap = $item_results["swap"];
												$totalPrice = $item_results["totalPrice"];
												$pricePerDay = $item_results["pricePerDay"];
												$value = $item_results["value"];
												$payPalBusinessAccount = $item_results["payPalBusinessAccount"];
												$contactNo = $item_results["contactNo"];
												$Vimage1 = $item_results["Vimage1"];
												$Vimage2 = $item_results["Vimage2"];
												$Vimage3 = $item_results["Vimage3"];
												$Vimage4 = $item_results["Vimage4"];
												$Vimage5 = $item_results["Vimage5"];
											?>

											<?= $item_sql ?>
											<?= $editId ?>
											<?= $item_results["productName"]; ?>
											<?= $productName ?>

												<!-- form start -->
												<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<!-- Post A Vehicle -->
													<!-- row 1 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Product Name<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="hidden" name="userId" id="userId" class="form-control" value="<?= $id ?>" required>
															<input type="text" name="productName" id="productName" class="form-control" value="<?= $productName ?>" required>
														</div>

														<label class="col-sm-2 control-label">Used Year<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="number" name="usedYear" id="usedYear" class="form-control" value="<?= $usedYear ?>" required>
														</div>

														<!-- <label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select name="brandname" required>
																<option value=""> Select </option>
																<?php 
																	$ret="select id,BrandName from tblbrands";
																	$query= $dbh -> prepare($ret);
																	//$query->bindParam(':id',$id, PDO::PARAM_STR);
																	$query-> execute();
																	$results = $query -> fetchAll(PDO::FETCH_OBJ);
																	if($query -> rowCount() > 0)
																	{
																		foreach($results as $result)
																		{
																	?>
																	<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
																<?php
																		}
																	} 
																?>
															</select>
														</div> -->
													</div>
													<!-- row 2 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Overview<span style="color:red">*</span></label>
														<div class="col-sm-10">
															<!-- <textarea class="form-control" name="overview" id="overview" rows="3" value="<?= $overview ?>" required></textarea> -->
															<textarea class="form-control" name="overview" id="overview" rows="3" required><?= $overview ?></textarea>
														</div>
													</div>
													<!-- row 3 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Total Price( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="totalPrice" id="totalPrice" class="form-control" value="<?= $totalPrice ?>" required>
														</div>

														<label class="col-sm-2 control-label">Price Per Day( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="pricePerDay" id="pricePerDay" class="form-control" value="<?= $pricePerDay ?>" required>
														</div>

														<label class="col-sm-2 control-label">Value( RM )<span style="color:red">*</span></label>
														<div class="col-sm-2">
															<input type="number" name="value" id="value" class="form-control" value="<?= $value ?>" required>
														</div>

														<!-- <label class="col-sm-2 control-label">pricePerDay<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<select name="fueltype" required>
																<option value=""> Select </option>
																<option value="Petrol">Petrol</option>
																<option value="Diesel">Diesel</option>
																<option value="CNG">CNG</option>
															</select>
														</div> -->
													</div>
													<!-- row 4 -->
													<div class="form-group">
														<label class="col-sm-2 control-label">Pay Pal Business Account<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="email" name="payPalBusinessAccount" id="payPalBusinessAccount" class="form-control" value="<?= $payPalBusinessAccount ?>" required>
														</div>

														<label class="col-sm-2 control-label">Contact Nombor<span style="color:red">*</span></label>
														<div class="col-sm-4">
															<input type="number" name="contactNo" id="contactNo" class="form-control" value="<?= $contactNo ?>" required>
														</div>
													</div>

													<div class="hr-dashed"></div>

												<!-- image -->
													<!-- row 1( subtitle ) -->
													<div class="form-group">
														<div class="col-sm-12">
															<h4><b>Upload Images</b></h4>
														</div>
													</div>
													<!-- row 2( upload image ) -->
													<div class="form-group">
														<div class="col-sm-4">
															Image 1
															<span style="color:red">*</span>
															<!-- <input type="file" name="img1" value="<?= $Vimage1 ?>" required> -->
															<input type="file" name="img1" value="<?= $Vimage1 ?>">
														</div>
														<div class="col-sm-4">
															Image 2
															<input type="file" value="<?= $Vimage2 ?>" name="img2">
														</div>
														<div class="col-sm-4">
															Image 3
															<input type="file" value="<?= $Vimage3 ?>" name="img3">
														</div>
													</div>
													<!-- row 3( upload image ) -->
													<div class="form-group">
														<div class="col-sm-4">
															Image 4
															<input type="file" value="<?= $Vimage4 ?>" name="img4">
														</div>
														<div class="col-sm-4">
															Image 5
															<input type="file" value="<?= $Vimage5 ?>" name="img5">
														</div>
													</div>

													<div class="hr-dashed"></div>

										</div>
									</div>
								</div>
							</div>
								
							<!-- form 2( accessories ) -->
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Category</div>
											<div class="panel-body">

												<!-- Accessories -->
													<!-- row 1 -->
												<div class="form-group">
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="sell" name="sell" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="sell" name="sell" value="1">
															<?php } ?>

															<label for="sell">sell</label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="rent" name="rent" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="rent" name="rent" value="1">
															<?php } ?>
															
															<label for="rent">rent</label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="checkbox checkbox-inline">
															<?php
																if($sell == 1){
															?>
																<input type="checkbox" id="swap" name="swap" value="1" checked>
															<?php
																}else{
															?>
																<input type="checkbox" id="swap" name="swap" value="1">
															<?php } ?>
															
															<label for="swap">swap</label>
														</div>
													</div>


												<!-- <div class="hr-dashed"></div> -->
												<br><br><br>

												<!-- Cancel & Save btn -->
												<div class="form-group text-center">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-default" type="reset">Cancel</button>
														<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
													</div>
												</div>
												
												<!-- form end -->
												</form>

										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Body -->

	<!-- Cancel & Save btn -->
	<!-- <div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-default" type="reset">Cancel</button>
			<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
		</div>
	</div> -->

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js">
		</script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js">
	</script>


	<!--Footer -->
	<?php include('includes/footer.php');?>
	<!-- /Footer--> 

	<!--Back to top-->
	<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
	<!--/Back to top--> 

	<!--Login-Form -->
	<?php include('includes/login.php');?>
	<!--/Login-Form --> 

	<!--Register-Form -->
	<?php include('includes/registration.php');?>

	<!--/Register-Form --> 

	<!--Forgot-password-Form -->
	<?php include('includes/forgotpassword.php');?>
	<!--/Forgot-password-Form --> 

	<!-- Scripts --> 
	<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script> 
		<script src="assets/js/interface.js"></script> 
		<!--Switcher-->
		<script src="assets/switcher/js/switcher.js"></script>
		<!--bootstrap-slider-JS--> 
		<script src="assets/js/bootstrap-slider.min.js"></script> 
		<!--Slider-JS--> 
		<script src="assets/js/slick.min.js"></script> 
	<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->
</html>

<?php } ?>