<?php 
  $source = $_POST["start_station"];
  $destination = $_POST["end_station"];
  $data = $_POST["date_of_journey"];
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Train Schedule</title>
<style>
    .button-container {
    text-align: left;
    /* Align buttons to the left within the container */
}

.button-container button {
    display: inline-block; /* Display buttons in a line */
    margin-right: 10px;
    
     /* Add margin between buttons if needed */
}

 .train-card {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    display: inline-block;
    width: 80%;
    margin-left:20%;
 }
 
 .journey-info {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    width: 15%;
    float: left;
 }
 .form { display: flex; flex-direction: column; width: 100%; max-width: 600px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); margin: 20px auto; } .form h2 { text-align: center; margin-bottom: 20px; } .form label { font-weight: bold; margin-bottom: 5px; } .form input[type="text"], .form input[type="date"] { width: 100%; padding: 8px 12px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; outline: none; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); } .form input[type="submit"] { background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s; } .form input[type="submit"]:hover { background-color: #5a5fe2; }
 .train-card button {
    margin: 5px;
    padding: 8px 12px;
    background-color: white;
    color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
/* Style for the date input */
.login-input {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

/* Style for the required asterisk */
.login-input:required::before {
  content: '*';
  color: red;
  margin-right: 5px;
}

/* Clear the float after .journey-info and .train-card */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
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
<body style="background-color:white">
<div id="headers"></div>
<header class="main_header fixed_header">
    <div class="container clearfix">
      <div class="logo_head">
        <a href="index.php"><img src="assets/images/irctc-new-logo.png" alt=""></a>
      </div><div class="logo_head" style="padding-top: 20px;">
      <?php
      session_start();
  $conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

  if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT name FROM login_user WHERE username = '$username'";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    // Fetch the row associated with the username
    $row = oci_fetch_assoc($stmt);

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
  </header><br><br><br><br>
  

  <div style="width:100%;background-color:#213d77;align-items:center;">
  <div style="width:100%;align-items:center;padding-top:20px;color:white;padding-left:25%;">
    <h2>CHANGE YOUR JOURNEY PLAN</h2>
</div>
  <form class="form" action="trains.php" method="post" onsubmit="return checkStations()" style="display: flex; flex-direction: row; align-items: center;background-color:#213d77;margin-left:20px;color:white;height:30px;">
  <div style="margin-left:20px;margin-right:20px;">
  
    <h6><label for="start_station">Start Station:</label></h6>
    <select id="start_station" name="start_station" value="<?php echo $source; ?>">
        <?php
        $conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            $query = "SELECT CODE, STATION_NAME FROM j_source";
            $stmt = oci_parse($conn, $query);
            oci_execute($stmt);

            while ($row = oci_fetch_assoc($stmt)) {
                echo '<option value="' . $row['CODE'] . '">' . $row['CODE'] . ' (' . $row['STATION_NAME'] . ')</option>';
            }
        }

        oci_free_statement($stmt);
        oci_close($conn);
        ?>
    </select><br></div>
    <div style="margin-left:20px;margin-right:20px;">
    <h6><label for="end_station">End Station:</label></h6>
    <select id="end_station" name="end_station" value="<?php echo $destination; ?>">
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
    </select><br></div>
    <div style="margin-left:20px;margin-right:20px;width:60%;">
    <h6><label for="date_of_journey">Date</label></h6>
    <input type="date" class="login-input" id="date_of_journey" name="date_of_journey" value="<?php echo $data; ?>" required><br>
    </div>
    <input type="submit" value="Modify Search">


    
  </form>
  <script>
  // Set default value using JavaScript
  var defaultValue = "<?php echo $source; ?>";
  var defaultValue1 = "<?php echo $destination; ?>";
  document.getElementById("start_station").value = defaultValue;
  document.getElementById("end_station").value = defaultValue1;
</script>
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

    // Call the function when the page is loaded
    window.onload = setMinMaxDate;
</script>
  </div>
  <form method='post' action='transact.php'>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $source = $_POST["start_station"];
    $destination = $_POST["end_station"];
    $data = $_POST["date_of_journey"];
    $formattedDate = date('d-M-Y', strtotime($data));
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

if (!$conn) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    $query = "SELECT j_id
    FROM journey
    WHERE source_code = '$source' AND dest_code = '$destination'";
    $stmt = oci_parse($conn,$query);
    oci_execute($stmt);
    $ans = oci_fetch_assoc($stmt);
    $_SESSION["journey"]=$ans['J_ID'];
    $sql = "SELECT DISTINCT train_journey.T_ID
    FROM train_journey
    INNER JOIN seat_availability ON train_journey.T_ID = seat_availability.TRAIN_ID
    WHERE train_journey.jo_id IN (
        SELECT j_id
        FROM journey
        WHERE source_code = '$source' AND dest_code = '$destination'
    )
    AND seat_availability.dates = TO_DATE(:formattedDate, 'DD-MON-YYYY')
    ";
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':formattedDate', $formattedDate);
    oci_execute($stid);
    while ($row = oci_fetch_assoc($stid)) {
      $train = $row['T_ID'];
      $sql1 = "SELECT
      TRAIN_ID,
      TRAIN_NAME,
      SOURCE,
      DEST,
      TO_CHAR(DEP_TIME, 'HH24:MI') AS DEPARTURE_TIME,
      TO_CHAR(ARR_TIME, 'HH24:MI') AS ARRIVAL_TIME
  FROM
      train
   WHERE train_id='$train'";
      $stid1 = oci_parse($conn,$sql1);
      oci_execute($stid1);
      $row1 = oci_fetch_assoc($stid1);
      $sql2 = "SELECT * FROM train_day WHERE train_id='$train'";
      $stid2 = oci_parse($conn, $sql2);
      oci_execute($stid2);
      $source1 = $row1['SOURCE'];
      $dest1 = $row1['DEST'];
      $sql3 = "SELECT station_name FROM j_source WHERE code='$source1'";
      $sql4 = "SELECT station_name FROM j_dest WHERE code='$dest1'";
      $stid3 = oci_parse($conn,$sql3);
      $stid4 = oci_parse($conn,$sql4);
      oci_execute($stid3);
      oci_execute($stid4);
      $row3 = oci_fetch_assoc($stid3);
      $row4 = oci_fetch_assoc($stid4);

echo "
    <div class='train-card'>
        <div style='width:100%; color:black; background-color:whitesmoke;'>
            <h3 style='text-align:left;'><br>" . $row1['TRAIN_NAME'] . "(" . $train . ")</h3>
            <h6 style='text-align:right;color:blue;'>Runs on:";

            while ($row2 = oci_fetch_assoc($stid2)) {
              echo "<a href=''> " . strtoupper(substr($row2['DAY'], 0, 1)) . "</a>";
          }
      ?>    


            </h6>
        </div>
        <div style='width:100%;color:black;background-color:#E6E6FA;'>
        <h4><p style='text-align:left'>
        <br>
        <?php echo $row1['DEPARTURE_TIME']."|".$row3['STATION_NAME']."|".$formattedDate;?>
      </p>
      <p style='text-align: right';><?php 
            // Check if the hour of arrival time is less than the hour of departure time
            $arrivalHour = date('H', strtotime($row1['ARRIVAL_TIME']));
            $departureHour = date('H', strtotime($row1['DEPARTURE_TIME']));

            if ($arrivalHour < $departureHour) {
              $nextDate = date('d-M-Y', strtotime($formattedDate . ' +1 day'));
          } else {
              $nextDate = date('d-M-Y', strtotime($formattedDate));
          }

            echo $row1['ARRIVAL_TIME']."|".$row4['STATION_NAME']."|".$nextDate;
        ?></p></h4>
        <br>
        </div>
        <div class='button-container' style='width:100%;background-color:aliceblue;color:black;'>
    <?php
    $sql5 = "SELECT * FROM seat_availability WHERE train_id=:train AND dates = TO_DATE(:formattedDate, 'DD-MON-YYYY')";
    $stid5 = oci_parse($conn, $sql5);
    oci_bind_by_name($stid5, ':train', $train);
    oci_bind_by_name($stid5, ':formattedDate', $formattedDate);
    oci_execute($stid5);

    while ($row5 = oci_fetch_assoc($stid5)) {
        $class = $row5['CLASS_ID'];
        $sql6 = "SELECT * FROM class WHERE class_id=:class";
        $stid6 = oci_parse($conn, $sql6);
        oci_bind_by_name($stid6, ':class', $class);
        oci_execute($stid6);
        $row6 = oci_fetch_assoc($stid6);

        $cname = $row6['CLASS_NAME'];
        ?>
        <button value='<?php echo $class;?>' style='width:250px;' onclick="aashin('<?php echo $train;?>','<?php echo $class;?>')">
            <h5><?php echo $cname.'('.$class.')';?><br>Refresh</h5>
        </button>
        <?php
    }
    ?>
   
</div>
<br><br>
<h4>Please check <a href="https://enquiry.indianrail.gov.in/mntes/q?opt=TrainRunning&subOpt=ShowRunC">NTES website</a>
 or <a href="https://play.google.com/store/apps/details?id=cris.icms.ntes">NTES app</a>
 for actual time before boarding</h4>
 <br>
 </div>;
<?php
    }
    
    
    
    oci_close($conn);
    
    
}
}
oci_free_statement($stid);
oci_close($conn);
?>
<input type="hidden" id="train_id" name="train_id" value="">
<input type="hidden" id="class_id" name="class_id" value="">
<!-- Add this input field inside your form -->
<input type="hidden" name="date_of_journey" value="<?php echo $data; ?>">

  </form>
  <script>
    function aashin(train, c) {
        // Set the values of train and class in the hidden input fields
        document.getElementById('train_id').value = train;
        document.getElementById('class_id').value = c;

        // Your existing logic or further actions go here
        // For example, you might submit the form after setting the values
        // document.getElementById('your_form_id').submit();
    }
</script>


</body>
</html>
