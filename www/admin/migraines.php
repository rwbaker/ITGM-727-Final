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


  // Initialize the session
  session_start();

  // Check if user is logged in, if not then redirect
  if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
      header("location: login.php");
      exit;
  } else {
      // print_r($_SESSION);
  }

  //Set some variables
  $viewUser = "";
  $userDetails = $userMigraines = array();

  // Set variables if they're there...
  if (isset($_GET["user"])) {
      // desired migraine from query string
      $viewUser = $_GET["user"];
  }

  // Get SINGLE USER from DB
  // ----------------------------------------------------------------------------
  // Standard & reusable db connection
   include "../includes/helpers/config.php";
     // Prepare a select statement
     $sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `password`, `password_salt`, `password_hash`, `created_at`, `user_type` FROM `user` WHERE user_id = '$viewUser'";

     if ($result = mysqli_query($link, $sql)) {
         /* fetch associative array */
         $userDetails = mysqli_fetch_assoc($result);
     }
     /* close connection */
     mysqli_close($link);

  // GET ALL MIGRAINES FOR SELECTED USER

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

          <h1 class="h3 mt-5 mb-3">
            <?php
              if ($userDetails["first_name"]) {
                  echo $userDetails["first_name"] . "'s";
              }
            ?>
            Migraines</h1>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Migraine</th>
                <th scope="col">Location</th>
                <th scope="col">Severity</th>
                <th scope="col">Duration</th>
                <th scope="col">Date Logged</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2018-01</td>
                <td>Front</td>
                <td>10</td>
                <td>4 hours</td>
                <td>Monday, March 1, 2018</td>
              </tr>
              <tr>
            </tbody>
          </table>


        </div> <!-- END OF .col -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
