<?php

// CREATE USER

function fail($err = "") {
  $err = $err ?: "";
  echo "Something went wrong. Please try again later. " . $err;
}

function createUser($firstname, $lastname, $email, $password) {

  require_once "includes/helpers/config.php";

  // Prepare an insert statement
  $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";

  if( $stmt = mysqli_prepare($link, $sql) ){

      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_email, $param_password);

      // Set parameters
      $param_fname = $firstname;
      $param_lname = $lastname;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
        // Redirect to login page
        header("location: login.php");
        echo $firstname . "|" . $lastname . "|" . $email . "|" . $password;

      } else{
        fail("inside if");
      }

      // mysqli_stmt_execute($stmt);
      printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

      // Close statement
      mysqli_stmt_close($stmt);
  } else {
    fail();
  }

  // Close connection
  mysqli_close($link);

}



?>
