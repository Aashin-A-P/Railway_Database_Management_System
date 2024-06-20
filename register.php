<?php
$conn = oci_connect('system', 'Aashin2101', 'Aashin:1521/xe');

    if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  } else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobno = $_POST['mobno'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO login_user (USER_ID, USERNAME, PASSWORD, NAME, DOB, EMAIL, MOB_NO, GENDER)
        VALUES (user_id_seq.NEXTVAL, :username, :password, :name, TO_TIMESTAMP(:dob, 'YYYY-MM-DD'), :email, :mobno, :gender)";

// Prepare the statement
$statement = oci_parse($conn, $sql);

// Bind the parameters
oci_bind_by_name($statement, ':username', $username);
oci_bind_by_name($statement, ':password', $password);
oci_bind_by_name($statement, ':name', $name);
oci_bind_by_name($statement, ':dob', $dob);
oci_bind_by_name($statement, ':email', $email);
oci_bind_by_name($statement, ':mobno', $mobno);
oci_bind_by_name($statement, ':gender', $gender);

// Execute the statement
if (oci_execute($statement)) {
  // Registration successful
  echo "User created successfully. Redirecting to login page in 5 seconds...";
  echo '<script>
          setTimeout(function() {
              window.location.href = "loaderlogin.php";
          }, 5000); // Redirect after 5 seconds
        </script>';
} else {
  echo "Username Already Exists.Redirecting to Registration page in 5 seconds...";
  echo '<script>
          setTimeout(function() {
              window.location.href = "loaderregistration.php";
          }, 5000); // Redirect after 5 seconds
        </script>';
}

// Clean up resources
oci_free_statement($statement);
  }
oci_close($conn);

?>