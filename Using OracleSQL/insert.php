<?php
session_start();

// Get form data
$base_fare = $_POST['base_fare'];
$tax = $_POST['tax'];
$total_fare = $_POST['total_fare'];
$payment_method = $_POST['paymentMethod'];

// Get user_id and pnr_no from session
$user_id = $_SESSION['user_id'];
$pnr_no = $_SESSION['PNR'];

// Insert into the transaction table
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');
$sql = "INSERT INTO transaction (base_fare, tax, total_fare, payment_method, user_id, pnr_no) 
        VALUES (:base_fare, :tax, :total_fare, :payment_method, :user_id, :pnr_no) RETURNING tran_id INTO :transaction_id";
$stmt = oci_parse($conn, $sql);

oci_bind_by_name($stmt, ":base_fare", $base_fare);
oci_bind_by_name($stmt, ":tax", $tax);
oci_bind_by_name($stmt, ":total_fare", $total_fare);
oci_bind_by_name($stmt, ":payment_method", $payment_method);
oci_bind_by_name($stmt, ":user_id", $user_id);
oci_bind_by_name($stmt, ":pnr_no", $pnr_no);
oci_bind_by_name($stmt, ":transaction_id", $transaction_id, 32);

oci_execute($stmt);
oci_commit($conn);

// Store the transaction_id in $_SESSION['transaction']
$_SESSION['transaction'] = $transaction_id;

// Close the connection
oci_close($conn);

// Redirect to a success page or perform additional actions

echo "<h1>Your Ticket is Being Generated...Redirecting in <span id='countdown'>5</span> seconds...</h1>";

echo '<script>
    var seconds = 5;
    function countdown() {
        document.getElementById("countdown").innerHTML = seconds;
        if (seconds <= 0) {
            window.location.href = "ticket1.php";
        } else {
            seconds--;
            setTimeout(countdown, 1000);
        }
    }
    countdown();
</script>';

exit();
?>
