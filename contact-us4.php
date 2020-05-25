<?php
  session_start();
  error_reporting(0);
  include('includes/config.php');

  if(isset($_POST['send']))
  {
    $productName=$_POST['productName'];
    $overview=$_POST['overview'];
    $usedYear=$_POST['usedYear'];
    $pricePerDay=$_POST['pricePerDay'];
    $totalPrice=$_POST['totalPrice'];
    $payPalBusinessAccount=$_POST['payPalBusinessAccount'];
    $contactNo=$_POST['contactNo'];
    $image=$_POST['image'];
    ////////////////////////////////////////////////////////
    $sell=$_POST['sell'];
    $rent=$_POST['rent'];
    $swap=$_POST['swap'];

    $sql="INSERT INTO tblpostitem(productName,overview,usedYear,pricePerDay,totalPrice,payPalBusinessAccount,contactNo,image,sell,rent,swap) 
    VALUES(:productName,:overview,:usedYear,:pricePerDay,:totalPrice,:payPalBusinessAccount,:contactNo,:image,:sell,:rent,:swap)";
    // $sql="INSERT INTO tblpostitem(productName) VALUES(:productName)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':productName',$productName,PDO::PARAM_STR);
    $query->bindParam(':overview',$overview,PDO::PARAM_STR);
    $query->bindParam(':usedYear',$usedYear,PDO::PARAM_STR);
    $query->bindParam(':pricePerDay',$pricePerDay,PDO::PARAM_STR);
    $query->bindParam(':totalPrice',$totalPrice,PDO::PARAM_STR);
    $query->bindParam(':payPalBusinessAccount',$payPalBusinessAccount,PDO::PARAM_STR);
    $query->bindParam(':contactNo',$contactNo,PDO::PARAM_STR);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->bindParam(':sell',$sell,PDO::PARAM_STR);
    $query->bindParam(':rent',$rent,PDO::PARAM_STR);
    $query->bindParam(':swap',$swap,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    
    if($lastInsertId)
    {
      // $msg="Query Sent. We will contact you shortly";
      $msg="Item Posted.";
    }
    else 
    {
      $error="Something went wrong. Please try again " . $productName . $overview . $usedYear . $pricePerDay . $totalPrice . $payPalBusinessAccount . $contactNo . $image . "\n" .$sql;

    }
  }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>CarForYou - Responsive Car Dealer HTML5 Template</title>
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
    /* ???
    span {
      color: red;
    } 
    */
  </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Contact Us</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Contact Us</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Contact-us-->
<div class="ts-main-content section-padding">
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">

      <!-- partition 1( left ) -->
          <h3>Get in touch using the form below</h3>
          <!-- notify( success/error ) -->
            <?php 
                if($error){
              ?>
                <div class="errorWrap">
                  <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div>
              <?php
                } 
                else if($msg){
              ?>
                <div class="succWrap">
                  <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                </div>
              <?php 
                }
            ?>

            <div class="contact_form gray-bg">
              <!-- form -->
              <form method="post">
                <div class="form-group">
                  <label class="control-label">Product Name<span>*</span></label>
                  <input type="text" class="form-control white_bg" id="productName" name="productName" required>
                </div>

                <!--  -->
                <div class="form-group">
                  <label class="control-label">Overview<span>*</span></label>
                  <textarea class="form-control white_bg" name="overview" id="overview" rows="4" required></textarea>
                  <!-- <input type="text" name="overview" class="form-control white_bg" id="overview" required> -->
                </div>
                <div class="form-group">
                  <label class="control-label">Used Year<span>*</span></label>
                  <input type="text" name="usedYear" class="form-control white_bg" id="usedYear" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Price per Day <span>*</span></label>
                  <textarea class="form-control white_bg" name="pricePerDay" id="pricePerDay" rows="4" required></textarea>
                </div>
                <!--  -->
                <div class="form-group">
                  <label class="control-label">Total Price<span>*</span></label>
                  <input type="text" name="totalPrice" class="form-control white_bg" id="totalPrice" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Pay Pal Business Account<span>*</span></label>
                  <textarea class="form-control white_bg" name="payPalBusinessAccount" id="payPalBusinessAccount" rows="4" required></textarea>
                  <!-- <input type="text" name="overview" class="form-control white_bg" id="overview" required> -->
                </div>
                <div class="form-group">
                  <label class="control-label">Contact Number<span>*</span></label>
                  <input type="text" name="contactNo" class="form-control white_bg" id="contactNo" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Image <span>*</span></label>
                  <textarea class="form-control white_bg" name="image" id="image" rows="4" required></textarea>
                </div>
                <!--  -->

                <!-- form 2( accessories ) -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">Category</div>
                        <div class="panel-body">

                          <!-- Accessories -->
                          <!-- row 1 -->
                          <div class="form-group">
                            <div class="col-sm-3">
                              <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="sell" name="sell" value="1">
                                <label for="sell">Sell</label>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="rent" name="rent" value="1">
                                <label for="rent">Rent</label>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="checkbox checkbox-inline">
                                <input type="checkbox" id="swap" name="swap" value="1">
                                <label for="swap">Swap</label>
                              </div>
                            </div>
                          </div>                          

                          <!-- Cancel & Save btn -->
                         <!--  <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                              <button class="btn btn-default" type="reset">Cancel</button>
                              <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                            </div>
                          </div> -->
                          
                          <!-- form end -->
                          </form>

                      </div>
                    </div>
                  </div>
                </div>

                <!--  -->
                <div class="form-group">
                  <button class="btn" type="submit" name="send" type="submit">Submit<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              </form>
            </div>


          </div>
				</div>
			</div>
		</div>
	</div>
<!-- /Contact-us--> 


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
<script src="assets/js/jquery.min.js">
  </script>
  <script src="assets/js/bootstrap.min.js"></script> 
  <script src="assets/js/interface.js"></script> 
  <!--Switcher-->
  <script src="assets/switcher/js/switcher.js"></script>
  <!--bootstrap-slider-JS--> 
  <script src="assets/js/bootstrap-slider.min.js"></script> 
  <!--Slider-JS--> 
  <script src="assets/js/slick.min.js"></script> 
  <script src="assets/js/owl.carousel.min.js">
</script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->
</html>
