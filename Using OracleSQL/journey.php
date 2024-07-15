<?php
session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
  <style>
   .form { display: flex; flex-direction: column; width: 100%; max-width: 600px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); margin: 20px auto; } .form h2 { text-align: center; margin-bottom: 20px; } .form label { font-weight: bold; margin-bottom: 5px; } .form input[type="text"], .form input[type="date"] { width: 100%; padding: 8px 12px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; outline: none; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); } .form input[type="submit"] { background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; } .form input[type="submit"]:hover { background-color: #5a5fe2; }

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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


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
      </div><div class="logo_head" style="padding-top: 20px;">
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
          <div class="menuName">Menu</disv>
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
  </header>
  <br><br>
<div><h1 style="color: blue;text-align:right;padding-right:5%";>INDIAN RAILWAYS</h1></div>
<form class="form" action="trains.php" method="post" onsubmit="return checkStations()">
    <h2 style="color: blue;">BOOK TICKET</h2>
    
    <h6><label for="start_station">Start Station:</label></h6><br>
    <select id="start_station" name="start_station">
        <?php
        $conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            $query = "SELECT CODE, STATION_NAME FROM j_source ORDER BY STATION_NAME";
            $stmt = oci_parse($conn, $query);
            oci_execute($stmt);

            while ($row = oci_fetch_assoc($stmt)) {
                echo '<option value="' . $row['CODE'] . '">' . $row['CODE'] . ' (' . $row['STATION_NAME'] . ')</option>';
            }
        }

        oci_free_statement($stmt);
        oci_close($conn);
        ?>
    </select><br>

    <h6><label for="end_station">End Station:</label></h6><br>
    <select id="end_station" name="end_station">
        <?php
        $conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            $query = "SELECT CODE, STATION_NAME FROM j_dest";
            $stmt = oci_parse($conn, $query);
            oci_execute($stmt);

            while ($row = oci_fetch_assoc($stmt)) {
                echo '<option value="' . $row['CODE'] . '">' . $row['CODE'] . ' (' . $row['STATION_NAME'] . ')</option>';
            }
        }

        oci_free_statement($stmt);
        oci_close($conn);
        ?>
    </select><br>

    <h6><label for="date_of_journey">Date of Journey:</label></h6><br>
    <input type="date" class="login-input" id="date_of_journey" name="date_of_journey" required><br>

    <input type="submit" value="Submit">
</form>

<script>
    function checkStations() {
        var startStation = document.getElementById('start_station').value;
        var endStation = document.getElementById('end_station').value;

        if (startStation === endStation) {
            alert('Start and End stations cannot be the same. Please select different stations.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
<script>
    // Function to set the minimum and maximum date for the date input
    function setMinMaxDate() {
        var today = new Date();
        var maxDate = new Date();
        maxDate.setDate(today.getDate() + 120); // Add 120 days to today's date

        // Format the dates in 'YYYY-MM-DD' for the input's min and max attributes
        var formattedToday = today.toISOString().split('T')[0];
        var formattedMaxDate = maxDate.toISOString().split('T')[0];

        // Set the min and max attributes of the date input
        document.getElementById('date_of_journey').min = formattedToday;
        document.getElementById('date_of_journey').max = formattedMaxDate;
    }
    window.onload = setMinMaxDate;
    function updateSecondPage(startStation, endStation) {
        // Assuming you have a link to the second page
        var secondPageLink = 'second_page.php';

        // Construct the URL with parameters
        var url = secondPageLink + '?startStation=' + startStation + '&endStation=' + endStation;

        // Redirect to the second page
        window.location.href = url;
    }
    // Call the function when the page is loaded
    
</script>

  


  <br><br><br>
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
