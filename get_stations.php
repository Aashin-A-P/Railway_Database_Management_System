<?php
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

if (!$conn) {
    $response = "Database connection failed";
} else {
    $input = strtoupper($_POST['input']);
    $query = "SELECT CODE, STATION_NAME FROM j_source WHERE UPPER(STATION_NAME) LIKE :input || '%'";
    $stmt = oci_parse($conn, $query);
    oci_bind_by_name($stmt, ":input", $input);
    oci_execute($stmt);

    $response = "";
    while ($row = oci_fetch_assoc($stmt)) {
        $response .= '<option value="' . $row['CODE'] . '">' . $row['CODE'] . ' (' . $row['STATION_NAME'] . ')</option>';
    }

    oci_free_statement($stmt);
    oci_close($conn);
}

echo $response;
?>
