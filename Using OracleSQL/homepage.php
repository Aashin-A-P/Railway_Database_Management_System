<html>
    
</html><?php
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');
if (!$conn) {
    $e = oci_error();
    echo htmlentities($e['message'], ENT_QUOTES);
} else {
    echo "Connected to Oracle!";
    $query = 'SELECT t_name,seat,transamt FROM train INNER JOIN ticket ON train.t_id=ticket.t_id INNER JOIN transaction ON train.t_id = transaction.t_id';

    // Prepare and execute the query
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt);

    // Fetch and display results
    echo "<table border='1'>";
    while ($row = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Free statement and close connection
    oci_free_statement($stmt);
    oci_close($conn);
}
?>
