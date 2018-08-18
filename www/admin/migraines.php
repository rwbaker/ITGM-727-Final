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
     $sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `created_at`, `user_type` FROM `user` WHERE user_id = '$viewUser'";

     if ($result = mysqli_query($link, $sql)) {
         /* fetch associative array */
         $userDetails = mysqli_fetch_assoc($result);
     }
     // print_r($userDetails);
     /* close connection */
     mysqli_close($link);




     // Get Migraines from DB
     // ----------------------------------------------------------------------------
       // Standard & reusable db connection
       include "../includes/helpers/config.php";

         // Prepare a select statement
         $sql = "SELECT `migraine_id`, `severity`, `location`, `duration`, `start_time` FROM `migraine` WHERE `user_id` = '$viewUser'";

         if ($result = mysqli_query($link, $sql)) {
             /* fetch associative array */
             while ($row = mysqli_fetch_assoc($result)) {
                 $userMigraines[] = $row;
             }
             /* free result set */
             mysqli_free_result($result);
         }

        // print_r($userMigraines);

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

    <div class="container mt-1 px-0">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="index.php">
                Users
              </a></li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php
                  if ($userDetails["first_name"]) {
                      echo $userDetails["first_name"] . "'s Migraines";
                  }
                ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

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
              <?php
                foreach ($userMigraines as $data) {
                    echo "<tr data-href='details.php?user=$viewUser&migraine=" . $data["migraine_id"] . "'>";
                    foreach ($data as $field => $value) {
                        echo "<td><a href='details.php?user=$viewUser&migraine=" . $data["migraine_id"] . "'>" . $value . "</a></td>";
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
