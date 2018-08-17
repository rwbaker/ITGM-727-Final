<?php

// CREATE USER
// @TODO: Check for existing user
// @TODO: Salt password
// @TODO: Session support

//Friendly reusable error
function fail($err = "") {
  $err = $err ?: "";
  echo "Something went wrong. Please try again later. " . $err;
}

function createUser($firstname, $lastname, $email, $password) {

  // Standard & reusable db connection
  require_once "includes/helpers/config.php";

  // Prepare an insert statement
  $stmt = mysqli_prepare($link, "INSERT INTO user (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)");

  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $param_password);

  // Set parameters
  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

  /* execute prepared statement */
  mysqli_stmt_execute($stmt);
  printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

  // Redirect to login page
  // header("location: login.php");

  // Close statement
  mysqli_stmt_close($stmt);

  // Close connection
  mysqli_close($link);


  } //end function



?>
