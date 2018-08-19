<?php

function authuser($username, $password)
{
    $user = array();


    // Standard & reusable db connection
    require_once "includes/helpers/config.php";

    // Prepare a select statement
    $sql = "SELECT user_id, email, password_hash FROM user WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Set parameters
        // $param_username = $username;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if username exists, if yes then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        // $_SESSION["loggedin"] = true;
                        // $_SESSION["id"] = $id;
                        // $_SESSION["username"] = $email;

                        $user["loggedin"] = true;
                        $user["id"] = $id;
                        $user["username"] = $email;

                        // Redirect user to welcome page
                        // header("location: /private/index.php");
                        // echo "logged in";
                        // echo '<pre>';
                        // var_dump($_SESSION);
                        // echo '</pre>';
                        return $user;
                    } else {
                        // Display an error message if password is not valid
                        $password_err = "The password you entered was not valid.";
                        return $password_err;
                        echo "password error";
                    }
                } else {
                    echo "fetch error";
                }
            } else {
                // Display an error message if username doesn't exist
                $email_err = "No account found with that email.";
                return $email_err;
                echo "email error";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} // function
