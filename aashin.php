<?php
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

if (!$conn) {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {

// Get the date from the HTML form
$dateOfJourney = $_POST['date_of_journey'];

// Convert the input date to 'DD-MON-YYYY' format
$formattedDate = date('d-M-Y', strtotime($dateOfJourney));

// Query to select rows from the seat_availability table
$sql = "SELECT * FROM seat_availability WHERE dates = TO_DATE(:formattedDate, 'DD-MON-YYYY')";
$statement = oci_parse($conn, $sql);

// Bind the formatted date variable to the SQL query
oci_bind_by_name($statement, ':formattedDate', $formattedDate);

// Execute the SQL statement
oci_execute($statement);

// Fetch the results
while ($row = oci_fetch_assoc($statement)) {
    // Process each row as needed
    print_r($row);
}
}
// Close the database connection
oci_close($conn);
?>