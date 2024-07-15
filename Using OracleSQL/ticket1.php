<?php
session_start();

// Assuming you have the required session variables set
$PNR = $_SESSION["PNR"];
$user_id = $_SESSION["user_id"];
$j_id = $_SESSION["journey"];
$train_id = $_SESSION["train_id"];
$class_id = $_SESSION["class_id"];
$dates = $_SESSION["date"];
$trans = $_SESSION["transaction"];
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

// Check if the connection is successful
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the SQL statement
$sql = "INSERT INTO ticket (PNR, user_id, j_id, train_id, class_id, dates,trans_id) 
        VALUES (:PNR, :user_id, :j_id, :train_id, :class_id, :dates, :transaction_id)";


$stmt = oci_parse($conn, $sql);

// Bind parameters
oci_bind_by_name($stmt, ":PNR", $PNR);
oci_bind_by_name($stmt, ":user_id", $user_id);
oci_bind_by_name($stmt, ":j_id", $j_id);
oci_bind_by_name($stmt, ":train_id", $train_id);
oci_bind_by_name($stmt, ":class_id", $class_id);
oci_bind_by_name($stmt, ":dates", $dates);
oci_bind_by_name($stmt, ":transaction_id", $trans);
// Execute the statement
oci_execute($stmt);
$sqlUpdate = "UPDATE seat_availability
              SET no_of_seats = no_of_seats - 1
              WHERE train_id = :train_id
              AND class_id = :class_id
              AND dates = :dates";

$stmtUpdate = oci_parse($conn, $sqlUpdate);

// Bind parameters for update
oci_bind_by_name($stmtUpdate, ":train_id", $train_id);
oci_bind_by_name($stmtUpdate, ":class_id", $class_id);
oci_bind_by_name($stmtUpdate, ":dates", $dates);

// Execute the update statement
oci_execute($stmtUpdate);
// Commit the transaction
oci_commit($conn);

// Close the connection
oci_close($conn);

// Redirect to a success page or perform additional actions
echo '<script>
          setTimeout(function() {
              window.location.href = "ticket.php";
          }, 1000); // Redirect after 5 seconds
        </script>';
exit();
?>
