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
  $viewMigraine = $user_id = "";
  $myMigraine = array();

  // Set variables if they're there...
  if (isset($_SESSION["id"]) && isset($_GET["migraine"])) {
      // user from session
      $user_id = $_SESSION["id"];

      // desired migraine from query string
      $viewMigraine = $_GET["migraine"];

      // echo "<br />migraine #" . $viewMigraine;
      // echo "<br />user id: " . $user_id;
  }



// Get SINGLE Migraine from DB
// ----------------------------------------------------------------------------
  // Standard & reusable db connection
  include "../includes/helpers/config.php";

    // Prepare a select statement
    $sql = "SELECT `migraine_id`, `start_time`, `end_time`, `severity`, `location`, `weather`, `remedy`, `notes`, `duration` FROM `migraine` WHERE `migraine_id` = '$viewMigraine' and `user_id` = '$user_id'";

    if ($result = mysqli_query($link, $sql)) {
        /* fetch associative array */
        $myMigraine = mysqli_fetch_assoc($result);
    }

    // print_r($myMigraine);

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
    <script src="../bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- APP NAV BAR -->
    <?php include '../includes/header-private.php'; ?>

    <div class="container mt-1 px-0">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="index.php">Your Migraines</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Migraine
                <?php
                if ($myMigraine["migraine_id"]) {
                    echo ' # ' . $myMigraine["migraine_id"];
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
        <div id="migraine-details" class="col">

          <h1 class="h3 mb-3">
            Migraine
            <?php
            if ($myMigraine["migraine_id"]) {
                echo ' # ' . $myMigraine["migraine_id"];
            }
            ?>
          </h1>

          <!-- DATA -->
          <div class="row border-top border-bottom py-3">
            <div class="col-2">Duration</div>
            <div class="col-10">
              <?php
              if ($myMigraine["duration"]) {
                  echo $myMigraine["duration"];
              } else {
                  echo "<i>unknown duration</i>";
              }
              ?>
              <br />
              <span class="text-muted">
                <?php
                if ($myMigraine["start_time"]) {
                    echo $myMigraine["start_time"];
                }
                ?>
                &ndash;
                <?php
                if ($myMigraine["end_time"]) {
                    echo $myMigraine["end_time"];
                } else {
                    echo "<i>unknown end time</i>";
                }
                ?>
              </span>
              <!-- <button type="button" class="btn btn-outline-primary btn-sm ml-3">Edit Migraine</button> -->
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Severity</div>
            <div class="col-10">
              <?php
              if ($myMigraine["severity"]) {
                  echo $myMigraine["severity"];
              }
              ?>
              <span class="text-muted">out of</span> 10</div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Location</div>
            <div class="col-10">
              <?php
              if ($myMigraine["location"]) {
                  echo $myMigraine["location"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Current Weather</div>
            <div class="col-10">
              <?php
              if ($myMigraine["weather"]) {
                  echo $myMigraine["weather"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Remedy</div>
            <div class="col-10">
              <?php
              if ($myMigraine["remedy"]) {
                  echo $myMigraine["remedy"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Notes</div>
            <div class="col-6">
              <?php
              if ($myMigraine["notes"]) {
                  echo $myMigraine["notes"];
              }
              ?>
            </div>
          </div>

        <div class="row mt-4 mb-4">
          <button type="button" class="btn btn-primary mr-3">Edit</button>
          <!-- <button type="button" class="btn btn-outline-danger">Danger</button> -->
        </div>

        </div> <!-- END OF .col -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
