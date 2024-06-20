<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <style>
        /* CSS for Login Form */
        /* Style for the Pay Now button */
input[type="submit"] {
  background-color: #FFA07A; /* Light Red background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Padding around the text */
  font-size: 16px; /* Font size of the text */
  border: none; /* No border */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer; /* Cursor style on hover */
  transition: background-color 0.3s; /* Smooth transition for background color */
}

/* Hover effect for the Pay Now button */
input[type="submit"]:hover {
  background-color: #8B0000; /* Dark Red background color on hover */
}

.form {
  max-width: 350px;
  margin: 0 auto;
  padding: 20px;
  border-radius: 8px;
  background-color: #f7f7f7;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.login-title {
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.login-input {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.login-input:focus {
  outline: none;
  border-color: #007bff;
}

.login-button {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.login-button:hover {
  background-color: #0056b3;
}

.link {
  text-align: center;
  font-size: 14px;
  margin-top: 10px;
}

.link a {
  color: #007bff;
  text-decoration: none;
}

.link a:hover {
  text-decoration: underline;
}

.center {
  text-align: center;
}

    </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>|| IRCTC Corporate Portal ||</title>
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <!--Main style css-->
  <link rel="stylesheet" href="assets/css/style.css"> 
   <link rel="stylesheet" href="assets/css/style2.css">
  <!--Responsive style css-->
  <link rel="stylesheet" href="assets/css/responsive.css"> 
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="assets/js/jquery.min.js"></script>

  <script> 
    jQuery(function(){
      jQuery('#headers').load('header.html');       
      jQuery('#footer').load('footer.html');       
    });
  </script>

</head>
<body style="background-color: #141414;">
  <div style="background-image: url('assets/images/train.jpg');background-repeat: no-repeat;background-repeat: no-repeat;
      background-size: cover; /* Cover the entire screen */
      background-position: center; /* Center the image */
      height: 100vh;"> 
<!-- Start Header Here -->
    <div id="headers"></div>
<header class="main_header fixed_header">
    <div class="container clearfix">
      <div class="logo_head">
        <a href="index.php"><img src="assets/images/irctc-new-logo.png" alt=""></a>
      </div>
      <div class="logo_head" style="padding-top: 20px;">
      <?php
  $conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT user_id,name FROM login_user WHERE username = '$username'";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    // Fetch the row associated with the username
    $row = oci_fetch_assoc($stmt);
    $_SESSION["user_id"]= $row['USER_ID'];
    if ($row !== false && isset($row['NAME'])) {
        $name = $row['NAME'];
        echo "<h6>Welcome, $name!</h6>";
        // Other content for the logged-in user
    } else {
        echo "<h6>Welcome!</h6>"; // Default welcome if name not found or query fails
    }
}
} ?></div>
      <div class="navbar-expand-lg nav_btn_toggle">    
        <button class="navbar-toggler open_mobile_menu" type="button" data-target="#topNavMobile">
          <div class="menuName">Menu</div>
          <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
      </div>
            
      <nav class="top_nav_links navbar navbar-expand-lg">
              <div class="collapse navbar-collapse" id="topNav">
                  <ul class="navbar-nav">
				  <li class="has-child">
                      <a href="index.php">Home</a></li>
					<li class="has-child">
                      <a href="javascript:void(0);">About Us</a>
                        <ul class="sub-menu">
                          <li><a href="about.html"> About Us </a></li>
                        </ul>
                    </li>
					<li class="has-child">
                      <a href="login.php">Login</a>
					  <li><a href="registration.php">Register</a></li>
                      <li><a href="contact.html">Contact us </a></li>

                  </ul>
              </div>
      </nav>
      
    </div>
  </header><br><br><br><br><h1 style="color: blue;text-align:right;padding-right:5%";>INDIAN RAILWAYS</h1>
  <?php
  
  $tax = 0.05*$_SESSION["baseprice"];
  ?>
 <form class="form" method="post" name="login" action="insert.php">
 <input type="hidden" name="base_fare" value="<?php echo $_SESSION['baseprice']; ?>">
  <input type="hidden" name="tax" value="<?php echo $tax; ?>">
  <input type="hidden" name="total_fare" value="<?php echo $_SESSION['baseprice'] + $tax; ?>">
  <h2 class="login-title" style="text-align: left;">Base Fare: Rs.<?php echo $_SESSION["baseprice"]?></h2>
  <h2 class="login-title" style="text-align: left;">Tax: Rs.<?php echo $tax;?></h2>
  <h2 class="login-title" style="text-align: left;">Total Fare: Rs.<?php echo $_SESSION["baseprice"]+$tax;?></h2>

  <h2 class="login-title" style="text-align: left;">Mode of Payment:</h2>
  <h6>
  <div class="payment-option">
    <input type="radio" id="netBanking" name="paymentMethod" value="Net Banking">
    <label for="netBanking">
      <img src="net-banking-image.jpeg" alt="Net Banking" width="150" height="100">
      <br>Net Banking
    </label>
  </div>

  <div class="payment-option">
    <input type="radio" id="upi" name="paymentMethod" value="UPI">
    <label for="upi">
      <img src="upi-image.jpg" alt="UPI" width="150" height="100">
      <br>UPI
    </label>
  </div>

  <div class="payment-option">
    <input type="radio" id="creditDebitCard" name="paymentMethod" value="Credit/Debit Card">
    <label for="creditDebitCard">
      <img src="credit-debit-card-image.jpg" alt="Credit/Debit Card" width="150" height="100">
      <br>Credit/Debit Card
    </label>
  </div>
</h6><br>
<input type="submit" value="Pay Now">
</form>

      <?php
  
  ?>
 
  
<!-- Start Footer -->
    <div id="footer"></div>
	<footer>
      <div class="container">
        <div class="row">

          <div class="col-md-9">
          <h3 style="text-align: left;">Quick Links</h3>

            <div class="row">
              <div class="col-md-2">
                <ul class="quicklinks">
                  <li><a href="about.html" target="_blank"> About Us </a></li>
				  <li><a href="login.php" target="_blank"> Login </a></li>
				  <li><a href="registration.php" target="_blank"> Register </a></li>
				  <li><a href="contact.html" target="_blank"> Contact Us </a></li>
                  </ul>              
              </div>
              
              <div class="col-md-2">
                <ul class="quicklinks">
                  <li><a href="https://www.air.irctc.co.in/" target="_blank"> Air Ticketing </a></li>
                  <li><a href="https://www.irctctourism.com/" target="_blank"> Tourism </a></li>
                  <li><a href="https://www.irctc.co.in/nget/train-search" target="_blank"> Train Ticket</a></li>
                  <li><a href="https://www.ecatering.irctc.co.in/" target="_blank"> E Catering </a></li>
				   </ul>              
              </div>
              <div class="col-md-2">
			  <img src="assets/images/irctc-new-logo.png">
			  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">© 2023 IRCTC | MINI PROJECT BY Aashin, Archana, Kavyashree, Harish, Srinivasan.</div>
</footer>
<a id="back-to-top" href="#" class="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
  <i class="fa fa-arrow-up"></i>
</a>
<!--Bootstrap 4.1.0-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/libs/bootstrap-4.1.0/bootstrap.min.js"></script>

  <!--OwlCarousel2-2.3.4-->
  <script src="assets/libs/owlcarousel2-2.3.4/owl.carousel.min.js"></script>
  <!--Custom js-->
  <script src="assets/js/custom.js"></script>
  <!--Custom js-->
  <script src="assets/js/marquee.js"></script>
    <script>
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});    
  </script>
</body>
</html>
