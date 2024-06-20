<?php
session_start();

// Your database connection
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

// Ensure the connection is successful
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Values from the form
$name = $_POST['name'];
$age = $_POST['page'];
$gender = $_POST['gender'];
$nation = $_POST['nation'];
$mobno = $_POST['mobno'];

// Get the next PNR value from the sequence
$sql_sequence = "SELECT passenger_seq.NEXTVAL FROM DUAL";
$stid_sequence = oci_parse($conn, $sql_sequence);
oci_execute($stid_sequence);
$pnr = oci_fetch_assoc($stid_sequence)['NEXTVAL'];
$_SESSION["PNR"]=$pnr;
// User ID from the session
$user_id = $_SESSION['user_id'];

// Insert into passenger table
$sql_passenger = "INSERT INTO passenger (PNR, NAME, AGE, GENDER, NATIONALITY, MOB_NO, USER_ID) VALUES 
                    (:pnr, :name, :age, :gender, :nation, :mobno, :user_id)";

$stid_passenger = oci_parse($conn, $sql_passenger);

oci_bind_by_name($stid_passenger, ':pnr', $pnr);
oci_bind_by_name($stid_passenger, ':name', $name);
oci_bind_by_name($stid_passenger, ':age', $age);
oci_bind_by_name($stid_passenger, ':gender', $gender);
oci_bind_by_name($stid_passenger, ':nation', $nation);
oci_bind_by_name($stid_passenger, ':mobno', $mobno);
oci_bind_by_name($stid_passenger, ':user_id', $user_id);

if(oci_execute($stid_passenger)){
    echo "<h1>Redirecting to Transaction Page in <span id='countdown'>5</span> seconds...</h1>";
    echo '<script>
          setTimeout(function() {
              window.location.href = "transaction.php";
          }, 5000); // Redirect after 5 seconds
        </script>';
}


// Close the Oracle connection
oci_close($conn);
?>
