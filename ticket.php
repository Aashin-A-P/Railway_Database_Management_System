<?php 
session_start();
?>
<?php
$pnr = $_SESSION["PNR"];
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

if (!$conn) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    $sql="SELECT * FROM ticket WHERE pnr='$pnr'";
    $stid=oci_parse($conn,$sql);
    oci_execute($stid);
    $row=oci_fetch_assoc($stid);
    $journey = $row["J_ID"];
    $train = $row["TRAIN_ID"];
    $class = $row["CLASS_ID"];
    $dates = $row["DATES"];
    $user = $row["USER_ID"];
    $trans = $row["TRANS_ID"];
    $sql1 = "SELECT * FROM journey WHERE j_id='$journey'";
    $stid1=oci_parse($conn,$sql1);
    oci_execute($stid1);
    $row1=oci_fetch_assoc($stid1);
    // For $stid2
    $sql2 = "SELECT * FROM train WHERE train_id='$train'";
$stid2 = oci_parse($conn, $sql2);
oci_execute($stid2);
$row2 = oci_fetch_assoc($stid2);
$sql3 = "SELECT * FROM class WHERE class_id='$class'";
// For $stid3
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);
$row3 = oci_fetch_assoc($stid3);
$sql4 = "SELECT * FROM login_user WHERE user_id='$user'";
// For $stid4
$stid4 = oci_parse($conn, $sql4);
oci_execute($stid4);
$row4 = oci_fetch_assoc($stid4);
$sql5 = "SELECT * FROM transaction WHERE tran_id='$trans'";
// For $stid5
$stid5 = oci_parse($conn, $sql5);
oci_execute($stid5);
$row5 = oci_fetch_assoc($stid5);
$source = $row1["SOURCE_CODE"];
$dest = $row1["DEST_CODE"];
$source1= $row2["SOURCE"];
$dest1= $row2["DEST"];
$sql6 = "SELECT * FROM j_source WHERE code='$source'";
$sql7 = "SELECT * FROM j_dest WHERE code='$dest'";
$sql8 = "SELECT * FROM j_source WHERE code='$source1'";
$sql9 = "SELECT * FROM j_dest WHERE code='$dest1'";
$stid6 = oci_parse($conn, $sql6);
oci_execute($stid6);
$row6 = oci_fetch_assoc($stid6);
$stid7 = oci_parse($conn, $sql7);
oci_execute($stid7);
$row7 = oci_fetch_assoc($stid7);
$stid8 = oci_parse($conn, $sql8);
oci_execute($stid8);
$row8 = oci_fetch_assoc($stid8);
$stid9 = oci_parse($conn, $sql9);
oci_execute($stid9);
$row9 = oci_fetch_assoc($stid9);
$sql10 = "SELECT * FROM passenger WHERE pnr='$pnr'";
$stid10 = oci_parse($conn, $sql10);
oci_execute($stid10);
$row10 = oci_fetch_assoc($stid10);
$sql11 = "SELECT * FROM seat_availability WHERE train_id = '{$_SESSION['train_id']}' AND class_id = '{$_SESSION['class_id']}' AND dates = '{$_SESSION['date']}'";
$stid11 = oci_parse($conn, $sql11);
oci_execute($stid11);
$row11 = oci_fetch_assoc($stid11);
$sql12 = "SELECT TO_CHAR(
    TO_TIMESTAMP(
      TO_CHAR(TIMESTAMP, 'DD-MON-YY HH.MI.SSXFF AM'), 
      'DD-MON-RR HH.MI.SSXFF AM'
    ), 
    'DD-MON-YYYY HH.MI.SS AM'
  ) AS formatted_timestamp
FROM transaction 
WHERE tran_id='$trans'";
$stid12 = oci_parse($conn, $sql12);
oci_execute($stid12);
$row12 = oci_fetch_assoc($stid12);
$sql13 = "SELECT
      TRAIN_ID,
      TRAIN_NAME,
      SOURCE,
      DEST,
      TO_CHAR(DEP_TIME, 'HH24:MI') AS DEPARTURE_TIME,
      TO_CHAR(ARR_TIME, 'HH24:MI') AS ARRIVAL_TIME
  FROM
      train
   WHERE train_id='$train'";
      $stid13 = oci_parse($conn,$sql13);
      oci_execute($stid13);
      $row13 = oci_fetch_assoc($stid13);
oci_close($conn);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aashin.css">
    <title>Ticket</title>
   

</head>
<body>
<div class="ticket-container">
    <center><h4><u>Electronic Reservation Slip (ERS)</u>-Normal User</h4></center>
    <div class="image-container">
        <div class="left-images">
            <img src="ir.png" alt="Left Image 1">
            <img src="akam.jpg" alt="Left Image 2">
        </div>
        <div class="right-images">
            <img src="g20.png" alt="Right Image 1">
            <img src="irctc-logo.png" alt="Right Image 2">
        </div>
    </div><hr>
    <div class="booking-info">
    <div class="left">Train From</div>
    <div class="center">Boarding At</div>
    <div class="right">To</div>
</div>
<div class="booking-info">
    <div class="left" style="padding-left: 12%";><b><?php echo $row8['STATION_NAME']."(".$row8['CODE'].")";?></b></div>
    <div class="center" style="padding-left: 8%";><b><?php echo $row6['STATION_NAME']."(".$row1['SOURCE_CODE'].")";?></b></div>
    <div class="right" style="padding-right:10%";><B><?php echo $row9['STATION_NAME']."(".$row9['CODE'].")";?></div>
</div>
<div class="booking-info">
    <div class="left" style="padding-left: 8%"><b>Start Date:<?php echo $dates." ".$row13['DEPARTURE_TIME'].":00";?></b></div>
    <?php
    $arrivalHour = date('H', strtotime($row13['ARRIVAL_TIME']));
    $departureHour = date('H', strtotime($row13['DEPARTURE_TIME']));
    

    if ($arrivalHour < $departureHour) {
      $nextDate = date('d-M-Y', strtotime($dates . ' +1 day'));
      
  } else {
      $nextDate = date('d-M-Y', strtotime($dates));
  }
  ?>
    
    <div class="right" style ="padding-right: 8%";><b>End Date:<?php echo $nextDate." ".$row13['ARRIVAL_TIME'].":00";?></b></div>
</div><<hr>
<div class="booking-info">
    <div class="left">PNR</div>
    <div class="center">Train No./Name</div>
    <div class="right">Class</div>
</div>
<div class="booking-info">
<div class="left" style="padding-left: 12%;font-size: 25px;color:#3B9EBF;";><b><?php echo $pnr;?></b></div>
    <div class="center" style="font-size: 25px;color:#3B9EBF;padding-left:5%;"><b><?php echo $train."/".$row2['TRAIN_NAME'];?></b></div>
    <div class="right" style="padding-right:8%;font-size: 25px;color:#3B9EBF;";><B><?php echo $row3['CLASS_NAME']."(".$class.")";?></div>
</div>
<div class="booking-info">
    <div class="left">Quota</div>
    
    <div class="right" style="padding-right:12%";>Booking Date</div>
</div>
<div class="booking-info">
    <div class="left" style="padding-left: 14%;">GENERAL</div>
    
    <div class="right" style="padding-right:8%";><?php
echo $row12['FORMATTED_TIMESTAMP'];


?></div>
</div>
<hr>
<h2 style="padding-left:15px;"><u>Passenger Details</u></h3>
<div class="booking-info">
    <div class="left">Name</div>
    <div class="center">Age</div>
    <div class="center">Gender</div>
    <div class="right">Coach/Seat</div>
</div>
<div class="booking-info">
    <div class="left" style="padding-left:14%;" ;><?php echo $row10['NAME'];?></div>
    <div class="center" style="padding-right:1%;"><?php echo $row10['AGE'];?></div>
    <div class="center" style="padding-right:2%;"><?php
// Assuming $row10['GENDER'] contains the gender value
$gender = $row10['GENDER'];
$capitalized_gender = ucfirst($gender);

echo $capitalized_gender;
?>
</div>
    <div class="right" style="padding-right: 16%;"><?php $no=$row11['NO_OF_SEATS'];
    $no1=$row3['SEAT_PER_COMPARTMENT'];
    if ($class == '2A') {
        $result = 'A1';
    } elseif ($class == '3A') {
        $result = 'B1';
    } elseif ($class == 'SL') {
        $result = 'S1';
    } elseif ($class == 'CC') {
        $result = 'C1';
    } elseif ($class == 'EC') {
        $result = 'E1';
    } elseif ($class == '2S') {
        $result = 'D1';
    } elseif ($class == '1A'){
        $result = 'HA1';
    }
    else {
        $result = 'E1';
    }
    $result1= $no%$no1;
    echo $result."/".$result1;?>    
    </div>
</div><hr>
<h2 style="padding-left: 1%";>Transaction ID: <?php echo $trans;?></h2>
<h4 style="padding-left: 1%";>IR covers only 57% of cost of travel on an average.</h4>
<h1 style="padding-left: 1%";><u>Payment Details:</u></h1>
<div class="booking-info">
    <div class="left">Ticket Fare:</div>
    <div class="center" style="padding-right: 50%";>Rs. <?php echo $row5['BASE_FARE'];?></div>
</div>
<div class="booking-info">
    <div class="left">Tax On Fare:  </div>
    <div class="center" style="padding-right: 50%";>Rs. <?php echo $row5['TAX'];?></div>
</div>
<div class="booking-info">
    <div class="left">Total Fare:</div>
    <div class="center" style="padding-right: 50%";>Rs. <?php echo $row5['TOTAL_FARE'];?></div>
</div>
<h5 style="padding-left: 10px;"> PG Charges as applicable(Additional)</h5>
<br>
<br>
<h4 style="padding-left: 10px;">IRCTC Convenience Fee is charged per e-ticket irrespective of number of passengers on the ticket. </h4>
<h4 style="padding-left: 10px;">Please Check correct departure,arrival from Railway Station Enquiry. </h4>
<br>
</div>
<br>
<br>
<center><button onclick="printTicket()">Print Ticket</button></center>
<br>
<center><button onclick="window.location.href = 'journey.php';">Go to Home Page</button></center>

    <!-- Your existing script tags -->
    <script>
        // Your existing JavaScript code

        // Function to print the ticket
        function printTicket() {
            window.print();
        }
    </script>
</body>
</html>
