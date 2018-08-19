<?php

/**
 * Exercise 3, Unit 9, ITGM-727
 * @author Richard Baker, rbaker22@student.scad.edu
 *
 * @assignment
 *
 *
 *
 *
 *
 * @shortdesc
 *
 *
 *
 * @dependencies
 * includes/header.php - standard header nav for all pages
 *
 *
 * Bootstrap @ https://getbootstrap.com
 *
 */

  //Importing helper functions to keep this page clean...
  include '../includes/functions/createuser.php';

  // Initialize the session
  session_start();

  // Check if user is logged in, if not then redirect
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("location: /~rbaker22/final/login.php");
      exit;
  } else {
      // print_r($_SESSION);
  }


  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Validate email
      if (empty(trim($_POST["form-text-email"]))) {
          $email_err = "Please enter an email address.";
      } else {
          // Store in var
          $email = $_POST["form-text-email"];
      }

      // Validate first name
      if (empty(trim($_POST["form-text-fname"]))) {
          $firstname_err = "Please enter a first name.";
      } else {
          // Store in var
          $firstname = $_POST["form-text-fname"];
      }

      // Validate last name
      if (empty(trim($_POST["form-text-lname"]))) {
          $lastname_err = "Please enter a last name.";
      } else {
          // Store in var
          $lastname = $_POST["form-text-lname"];
      }

      // Validate password
      if (empty(trim($_POST["form-text-password"]))) {
          $password_err = "Please enter a password.";
      } elseif (strlen(trim($_POST["form-text-password"])) < 6) {
          $password_err = "Password must have at least 6 characters.";
      } else {
          $password = trim($_POST["form-text-password"]);
      }

      // Validate USER TYPE
      if (empty(trim($_POST["form-select-usertype"]))) {
          $user_type = null;
      } else {
          // Store in var
          $user_type = $_POST["form-select-usertype"];
      }

      // echo "user type: " . $user_type;

      // Check input errors before inserting in database
      if (empty($email_err) && empty($password_err)) {
          createUser($firstname, $lastname, $email, $password, $user_type);
      }
  }



  $allUsers = array();
  // Get all users from DB
  // ----------------------------------------------------------------------------
    // Standard & reusable db connection
    include "../includes/helpers/config.php";

      // Prepare a select statement
      $sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `created_at`, `user_type` FROM `user`";

      if ($result = mysqli_query($link, $sql)) {
          /* fetch associative array */
          while ($row = mysqli_fetch_assoc($result)) {
              $allUsers[] = $row;
          }
          /* free result set */
          mysqli_free_result($result);
      }

      /* close connection */
      mysqli_close($link);


?>

  <!DOCTYPE html>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/main.css">
  <title>Migratrak, ITGM-727</title>
  </head>

  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- APP NAV BAR -->
    <?php include '../includes/header-admin.php'; ?>

    <div class="container mb-5 mt-3">

      <div class="row">
        <div class="col">

          <h1 class="h3 mt-5 mb-3">All Users</h1>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">User #</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">User Type</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($allUsers as $data) {
                    echo "<tr data-href='migraines.php?user=" . $data["user_id"] . "'>";
                    foreach ($data as $field => $value) {
                        if ($data["user_type"] == "admin") {
                            echo "<td>" . $value . "</td>";
                        } else {
                            echo "<td><a href='migraines.php?user=" . $data["user_id"] . "'>" . $value . "</a></td>";
                        }
                    }
                    echo "</tr>";
                }
              ?>
            </tbody>
          </table>


        </div> <!-- END OF .col -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
