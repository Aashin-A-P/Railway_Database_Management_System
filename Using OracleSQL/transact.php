<?php
session_start();
$_SESSION['train_id']=$_POST['train_id'];
$_SESSION['class_id']=$_POST['class_id'];
$inputDate = $_POST['date_of_journey'];

// Convert the date format
$outputDate = date('d-M-Y', strtotime($inputDate));

// Store the converted date in the session variable
$_SESSION['date'] = $outputDate;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        * { box-sizing: border-box; }
@import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


body {
  font-family: 'Rubik', sans-serif;
}

.container {
  display: flex;
  height: 100vh;
}

.left {
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  animation-name: left;
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-delay: 1s;
}

.right {
  flex: 1;
  background-color: black;
  transition: 1s;
  background-image: url(assets/images/train.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}



h2 {
  margin: 0;
  color: #4f46a5;
}

h4 {
  margin-top: 10px;
  font-weight: normal;
  font-size: 15px;
  color: rgba(0,0,0,.4);
}

.form {
  max-width: 80%;
  display: flex;
  flex-direction: column;
}

.form > p {
  text-align: right;
}

.form > p > a {
  color: #000;
  font-size: 14px;
}

.form-field {
  height: 46px;
  padding: 0 16px;
  border: 2px solid #ddd;
  border-radius: 4px;
  font-family: 'Rubik', sans-serif;
  outline: 0;
  transition: .2s;
  margin-top: 20px;
}

.form-field:focus {
  border-color: #0f7ef1;
}

.form > button {
  padding: 12px 10px;
  border: 0;
  background: linear-gradient(to right, #de48b5 0%,#0097ff 100%); 
  border-radius: 3px;
  margin-top: 10px;
  color: #fff;
  letter-spacing: 1px;
  font-family: 'Rubik', sans-serif;
}

.animation {
  animation-name: move;
  animation-duration: .4s;
  animation-fill-mode: both;
  animation-delay: 2s;
}

.a1 {
  animation-delay: 2s;
}

.a2 {
  animation-delay: 2.1s;
}

.a3 {
  animation-delay: 2.2s;
}

.a4 {
  animation-delay: 2.3s;
}

.a5 {
  animation-delay: 2.4s;
}

.a6 {
  animation-delay: 2.5s;
}

@keyframes move {
  0% {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-40px);
  }

  100% {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
}

@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }

  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 440px;
  }
}</style>
</head>
<body>
    <div style="width:100%;background-color:blue;color:white;"><center><h1>Review Journey</h1></center></div>

<?php
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

$sql = "SELECT * FROM train WHERE train_id = '{$_SESSION['train_id']}'";
$sql1 = "SELECT * FROM class WHERE class_id = '{$_SESSION['class_id']}'";
$sql2 = "SELECT * FROM seat_availability WHERE train_id = '{$_SESSION['train_id']}' AND class_id = '{$_SESSION['class_id']}' AND dates = '{$_SESSION['date']}'";
$stid = oci_parse($conn,$sql);
$stid1 = oci_parse($conn,$sql1);
$stid2 = oci_parse($conn,$sql2);
oci_execute($stid);
oci_execute($stid1);
oci_execute($stid2);
$row = oci_fetch_assoc($stid);
$row1 = oci_fetch_assoc($stid1);
$row2 = oci_fetch_assoc($stid2);
$_SESSION["baseprice"]=$row1["PRICE"];
?>
<div class='train-card'>
        <div style='width:100%; color:black; background-color:whitesmoke;'>
            <h3 style='text-align:left;'><br>Train Name:<?php echo $row['TRAIN_NAME']. "(" . $row['TRAIN_ID'] . ")";?></h3>
            <h3>Date of Journey:<?php echo $_SESSION['date']?></h3>
            <h3>Class:<?php echo $row1['CLASS_NAME']?>(<?php echo $_SESSION['class_id']?>)</h3>
            <h3>AVAILABLE-<?php echo $row2['NO_OF_SEATS']?></h3>
            <h3>TICKET RATE : Rs.<?php echo $row1['PRICE']?></h3>
<div class="container">

  <div class="left">
    
    <div class="header">
      <h2 class="animation a1">Passenger Details</h2>
      
    </div>
    <form action="passenger.php" method="post" enctype="multipart/form-data">
    <div class="form">
        
    <input type="text" name="name" class="form-field animation a3" placeholder="Passenger Name" required>

      <input type="number" name="page" class="form-field animation a4" placeholder="Passenger Age" required>
      

        
      <select name="nation" class="form-field animation a7" required>
    <option value="" disabled selected>Select Nationality</option>
    <option value="indian">Indian</option>
    <option value="other">Other</option>
</select>

        <input type="number" name="mobno" class="form-field animation a8" placeholder="Mobile Number" required>
        <br>
        <label for="gender">Gender:</label>
        <select name="gender" class="form-field animation a9" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

    
      
      
      <button class="animation a6" type="submit">BOOK TICKET</button><br>
      
      
    </form>
    
     

    </div>
  </div>
  <div class="right"></div>
</div>

  </div>

</body>
</html>

