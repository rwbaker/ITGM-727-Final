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
      print_r($_SESSION);
  }



  // // Create Vars
  // $severity = array();
  // $locations = array();
  // $remedies = array();
  //
  // // Function to get Severities from DB
  // // ----------------------------------------------------------------------------
  //     // Include config file
  //     require_once "../includes/helpers/config.php";
  //
  //     // Prepare a select statement
  //     $sql = "SELECT * FROM `severity_id`";
  //     if ($stmt = mysqli_prepare($link, $sql)) {
  //         /* execute statement */
  //         mysqli_stmt_execute($stmt);
  //         /* bind result variables */
  //         mysqli_stmt_bind_result($stmt, $id, $sev);
  //         /* fetch values */
  //         while (mysqli_stmt_fetch($stmt)) {
  //             // printf("%s (%s)\n", $id, $sev);
  //             $severity[$id] = $sev;
  //         }
  //         /* close statement */
  //         mysqli_stmt_close($stmt);
  //     }
  //     /* close connection */
  //     // mysqli_close($link);
  //
  //
  // // Function to get Remedy from DB
  // // ----------------------------------------------------------------------------
  //     // Prepare a select statement
  //     $sql = "SELECT * FROM `remedy_types`";
  //     if ($stmt = mysqli_prepare($link, $sql)) {
  //         /* execute statement */
  //         mysqli_stmt_execute($stmt);
  //         /* bind result variables */
  //         mysqli_stmt_bind_result($stmt, $id, $rem);
  //         /* fetch values */
  //         while (mysqli_stmt_fetch($stmt)) {
  //             // printf("%s (%s)\n", $id, $rem);
  //             $remedies[$id] = $rem;
  //         }
  //         /* close statement */
  //         mysqli_stmt_close($stmt);
  //     }
  //     /* close connection */
  //     // mysqli_close($link);
  //
  // // Function to get Locations from DB
  // // ----------------------------------------------------------------------------
  //     // Include config file
  //     // require_once "../includes/helpers/config.php";
  //
  //     // Prepare a select statement
  //     $sql = "SELECT * FROM `migraine_location`";
  //     if ($stmt = mysqli_prepare($link, $sql)) {
  //         /* execute statement */
  //         mysqli_stmt_execute($stmt);
  //         /* bind result variables */
  //         mysqli_stmt_bind_result($stmt, $id, $loc);
  //         /* fetch values */
  //         while (mysqli_stmt_fetch($stmt)) {
  //             // printf("%s (%s)\n", $id, $loc);
  //             $locations[$id] = $loc;
  //         }
  //         /* close statement */
  //         mysqli_stmt_close($stmt);
  //     }
  //     /* close connection */
  //     mysqli_close($link);





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
              <li class="breadcrumb-item"><a href="#">Your Migraines</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Migraine</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <div class="container mb-5 mt-3">

      <div class="row">
        <div class="col-6">

          <h1 class="h3 mb-3">Add Migraine</h1>

          <!-- SIGNUP FORM -->
          <form action="index.php" method="post" enctype="multipart/form-data">

            <div class="row mb-0">
              <div class="col">

                <div class="form-group">
                  <label for="">Start time</label>
                  <input type="time" class="form-control" name="form-time-start" required value="<?php echo returnDateTimestamp(); ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">End time</label>
                  <input type="time" class="form-control" name="form-time-end" placeholder="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Severity</label>
              <select id="inputSeverity" name="form-select-severity" class="form-control">
                <option label=" "></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <?php
                  // foreach ($severity as $key => $value):
                  //   echo '<option value="'.$key.'">'.$value.'</option>';
                  // endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Location</label>
              <select id="inputLocation" name="form-select-location" class="form-control">
                <option label=" "></option>
                <option value="Front">Front</option>
                <option value="Back">Back</option>
                <option value="Left">Left</option>
                <option value="Right">Right</option>
                <?php
                  // foreach ($locations as $key => $value):
                  //   echo '<option value="'.$key.'">'.$value.'</option>';
                  // endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Current Weather</label>
              <select id="inputWeather" name="form-select-weather" class="form-control">
                <option label=" "></option>
                <option value="Sunny">Sunny</option>
                <option value="Cloudy">Cloudy</option>
                <option value="Foggy">Foggy</option>
                <option value="Rainy">Rainy</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Remedy</label>
              <select id="inputLocation" name="form-select-remedy" class="form-control">
                <option label=" "></option>
                <option value="Imitrex">Imitrex</option>
                <option value="Ibuprofen">Ibuprofen</option>
                <?php
                  // foreach ($remedies as $key => $value):
                  //   echo '<option value="'.$key.'">'.$value.'</option>';
                  // endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Notes</label>
              <textarea class="form-control" id="textareaNotes" name="form-textarea-notes" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2">Save</button>
          </form>

        </div> <!-- END OF .col-7 -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
