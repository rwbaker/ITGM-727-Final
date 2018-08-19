<?php

// CREATE USER
// @TODO: Check for existing user
// @TODO: Salt password
// @TODO: Session support

//Friendly reusable error
function fail($err = "")
{
    $err = $err ?: "";
    echo "Something went wrong. Please try again later. " . $err;
}

function createUser($firstname, $lastname, $email, $password, $user_type)
{

    // Standard & reusable db connection
    // File path is based on which file is calling it. This is a bit hacky
    // @TODO better file importing
    if (file_exists("includes/helpers/config.php")) {
        require_once "includes/helpers/config.php";
    } elseif (file_exists("../includes/helpers/config.php")) {
        require_once "../includes/helpers/config.php";
    }

    // Prepare an insert statement
    $stmt = mysqli_prepare($link, "INSERT INTO user (first_name, last_name, email, password_hash, user_type) VALUES (?, ?, ?, ?, ?)");

    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $param_password, $user_type);

    // Set parameters
  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

  /* execute prepared statement */
    mysqli_stmt_execute($stmt);
    // printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

    // Redirect to login page
    // @TODO this is a bit hacky... need to figure out how to do this right
    if ($user_type ==="admin") {
        header("location: ../admin/index.php");
    } else {
        header("location: login.php");
    }


    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} //end function
