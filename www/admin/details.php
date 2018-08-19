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
  include "../includes/functions/editmigraine.php";



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
    $userDetails = $userMigraine = array();

    // Set variables if they're there...
    if (isset($_GET["user"]) && isset($_GET["migraine"])) {
        // desired migraine from query string
        $viewUser = $_GET["user"];
        $viewMigraine = $_GET["migraine"];
    } elseif (isset($_POST["form-user-id"]) && isset($_POST["form-migraine-id"])) {
        // desired migrate from POST
        $viewUser = trim($_POST["form-user-id"]);
        $viewMigraine = trim($_POST["form-migraine-id"]);
    } else {
        echo "viewUser and viewMigraine are blank.";
    }

  // Processing form data when form is submitted
  // Handles NEW MIGRAINE
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Create variables
      $data_user = $data_migraine = "";
      $data_start = $data_end = $data_severity = $data_location = "";
      $data_weather = $data_remedy = $data_notes = "";

      if (!empty(trim($_POST["form-user-id"]))) {
          $data_user = $_POST["form-user-id"];
      }
      if (!empty(trim($_POST["form-migraine-id"]))) {
          $data_migraine = $_POST["form-migraine-id"];
      }
      if (!empty(trim($_POST["form-time-start"]))) {
          $data_start = $_POST["form-time-start"];
      }
      if (!empty(trim($_POST["form-time-end"]))) {
          $data_end = $_POST["form-time-end"];
      }
      if (!empty(trim($_POST["form-select-severity"]))) {
          $data_severity = $_POST["form-select-severity"];
      }
      if (!empty(trim($_POST["form-select-location"]))) {
          $data_location = $_POST["form-select-location"];
      }
      if (!empty(trim($_POST["form-select-weather"]))) {
          $data_weather = $_POST["form-select-weather"];
      }
      if (!empty(trim($_POST["form-select-remedy"]))) {
          $data_remedy = $_POST["form-select-remedy"];
      }
      if (!empty(trim($_POST["form-textarea-notes"]))) {
          $data_notes = $_POST["form-textarea-notes"];
      }

      if (!empty($data_user) && !empty($data_migraine)) {
          editMigraine($data_user, $data_migraine, $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes);
      }
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

     // Prepare a select statement
     $sql = "SELECT `migraine_id`, `start_time`, `end_time`, `severity`, `location`, `weather`, `remedy`, `notes`, `duration` FROM `migraine` WHERE `migraine_id` = '$viewMigraine' and `user_id` = '$viewUser'";

     if ($result = mysqli_query($link, $sql)) {
         /* fetch associative array */
         $userMigraine = mysqli_fetch_assoc($result);
     }

     /* close connection */
     mysqli_close($link);

$currentMigraine = $userMigraine["migraine_id"];


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
    <?php include '../includes/header-admin.php'; ?>

    <div class="container mt-1 px-0">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="index.php">
                Users
              </a></li>
              <li class="breadcrumb-item">
                <a href="migraines.php?user=<?php echo $viewUser ?>"><?php
                  if ($userDetails["first_name"]) {
                      echo $userDetails["first_name"] . "'s Migraines";
                  }
                ?>
              </a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Migraine
                <?php
                if ($userMigraine["migraine_id"]) {
                    echo ' # ' . $userMigraine["migraine_id"];
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

          <h1 class="h3 mt-5 mb-3">
            <?php
              if ($userDetails["first_name"]) {
                  echo $userDetails["first_name"] . "'s";
              }
            ?>
            Migraine
            <?php
            if ($userMigraine["migraine_id"]) {
                echo ' # ' . $userMigraine["migraine_id"];
            }
            ?>
          </h1>

          <!-- DATA -->
          <div class="row border-top border-bottom py-3">
            <div class="col-2">Duration</div>
            <div class="col-10">
              <?php
              if ($userMigraine["duration"]) {
                  echo $userMigraine["duration"];
              } else {
                  echo "<i>unknown duration</i>";
              }
              ?>
              <br />
              <span class="text-muted">
                <?php
                if ($userMigraine["start_time"]) {
                    echo $userMigraine["start_time"];
                }
                ?>
                &ndash;
                <?php
                if ($userMigraine["end_time"]) {
                    echo $userMigraine["end_time"];
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
              if ($userMigraine["severity"]) {
                  echo $userMigraine["severity"];
              }
              ?>
              <span class="text-muted">out of</span> 10</div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Location</div>
            <div class="col-10">
              <?php
              if ($userMigraine["location"]) {
                  echo $userMigraine["location"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Current Weather</div>
            <div class="col-10">
              <?php
              if ($userMigraine["weather"]) {
                  echo $userMigraine["weather"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Remedy</div>
            <div class="col-10">
              <?php
              if ($userMigraine["remedy"]) {
                  echo $userMigraine["remedy"];
              }
              ?>
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Notes</div>
            <div class="col-6">
              <?php
              if ($userMigraine["notes"]) {
                  echo $userMigraine["notes"];
              }
              ?>
            </div>
          </div>

        <div class="row mt-4 mb-4">
          <?php
            echo "<a href='edit.php?user=$viewUser&migraine=$currentMigraine' role='button' class='btn btn-primary mr-3'>Edit</a>";
          ?>
          <!-- <button type="button" class="btn btn-outline-danger">Danger</button> -->
        </div>

        </div> <!-- END OF .col -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
