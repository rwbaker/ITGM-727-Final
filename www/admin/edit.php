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
  include "../includes/functions/datetime.php";


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
      if (isset($_GET["migraine"])) {
          // desired migraine from query string
          $viewUser = $_GET["user"];
          $viewMigraine = $_GET["migraine"];
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

         // Prepare a select statement
         $sql = "SELECT `migraine_id`, `start_time`, `end_time`, `severity`, `location`, `weather`, `remedy`, `notes`, `duration` FROM `migraine` WHERE `migraine_id` = '$viewMigraine' and `user_id` = '$viewUser'";

         if ($result = mysqli_query($link, $sql)) {
             /* fetch associative array */
             $userMigraine = mysqli_fetch_assoc($result);
         }

         /* close connection */
         mysqli_close($link);

    $currentMigraine = $userMigraine["migraine_id"];

// @TODO Convert to DB-driven
$severity = array("1"=>"1", "2"=>"2", "3"=>"3", "4"=>"4", "5"=>"5", "6"=>"6", "7"=>"7", "8"=>"8", "9"=>"9", "10"=>"10");
$location = array("Front"=>"Front", "Back"=>"Back", "Left"=>"Left", "Right"=>"Right");
$weather = array("Sunny"=>"Sunny", "Cloudy"=>"Cloudy", "Foggy"=>"Foggy", "Rainy"=>"Rainy");
$remedy = array("Imitrex"=>"Imitrex", "Ibuprofen"=>"Ibuprofen");

// print_r($userDetails);
// echo "<br><br>";
// print_r($userMigraine);

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
                Edit Migraine
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
        <div class="col-6">

          <h1 class="h3 mb-3">Edit Migraine</h1>

          <!-- SIGNUP FORM -->
          <form action="details.php" method="post" enctype="multipart/form-data">

            <input name="form-user-id" type="hidden" value="<?php echo $viewUser ?>" />
            <input name="form-migraine-id" type="hidden" value="<?php echo $viewMigraine ?>" />

            <div class="row mb-0">
              <div class="col">

                <div class="form-group">
                  <label for="">Start time</label>
                  <input type="time" class="form-control" name="form-time-start" required value="<?php echo $userMigraine["start_time"] ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">End time</label>
                  <input type="time" class="form-control" name="form-time-end" value="<?php echo $userMigraine["end_time"] ?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Severity</label>
              <select id="inputSeverity" name="form-select-severity" class="form-control">
                <option label=" "></option>
                <?php
                  // echo $userMigraine["severity"];
                  foreach ($severity as $key => $value):
                    echo "<option " . ($value == $userMigraine["severity"] ? ' selected ' : '') . "value='$key'>$value</option>";
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Location</label>
              <select id="inputLocation" name="form-select-location" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($location as $key => $value):
                    echo "<option " . ($value == $userMigraine["location"] ? ' selected ' : '') . "value='$key'>$value</option>";
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Current Weather</label>
              <select id="inputWeather" name="form-select-weather" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($weather as $key => $value):
                    echo "<option " . ($value == $userMigraine["weather"] ? ' selected ' : '') . "value='$key'>$value</option>";
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Remedy</label>
              <select id="inputLocation" name="form-select-remedy" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($remedy as $key => $value):
                    echo "<option " . ($value == $userMigraine["remedy"] ? ' selected ' : '') . "value='$key'>$value</option>";
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Notes</label>
              <textarea class="form-control" id="textareaNotes" name="form-textarea-notes" rows="3"><?php echo $userMigraine["notes"] ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2">Save</button>
          </form>

        </div> <!-- END OF .col-7 -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
