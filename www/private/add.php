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

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      header("location: private/index.php");
      exit;
  }

  // Create Vars
  $severity = array();
  $locations = array();
  $remedies = array();

  // Include config file
  // require_once "../includes/helpers/config.php";

  // Function to get Severities from DB
  // ----------------------------------------------------------------------------
      // Include config file
      require_once "../includes/helpers/config.php";

      // Prepare a select statement
      $sql = "SELECT * FROM `severity_id`";
      if ($stmt = mysqli_prepare($link, $sql)) {
          /* execute statement */
          mysqli_stmt_execute($stmt);
          /* bind result variables */
          mysqli_stmt_bind_result($stmt, $id, $sev);
          /* fetch values */
          while (mysqli_stmt_fetch($stmt)) {
              // printf("%s (%s)\n", $id, $sev);
              $severity[$id] = $sev;
          }
          /* close statement */
          mysqli_stmt_close($stmt);
      }
      /* close connection */
      // mysqli_close($link);


  // Function to get Remedy from DB
  // ----------------------------------------------------------------------------
      // Prepare a select statement
      $sql = "SELECT * FROM `remedy_types`";
      if ($stmt = mysqli_prepare($link, $sql)) {
          /* execute statement */
          mysqli_stmt_execute($stmt);
          /* bind result variables */
          mysqli_stmt_bind_result($stmt, $id, $rem);
          /* fetch values */
          while (mysqli_stmt_fetch($stmt)) {
              // printf("%s (%s)\n", $id, $rem);
              $remedies[$id] = $rem;
          }
          /* close statement */
          mysqli_stmt_close($stmt);
      }
      /* close connection */
      // mysqli_close($link);

  // Function to get Locations from DB
  // ----------------------------------------------------------------------------
      // Include config file
      // require_once "../includes/helpers/config.php";

      // Prepare a select statement
      $sql = "SELECT * FROM `migraine_location`";
      if ($stmt = mysqli_prepare($link, $sql)) {
          /* execute statement */
          mysqli_stmt_execute($stmt);
          /* bind result variables */
          mysqli_stmt_bind_result($stmt, $id, $loc);
          /* fetch values */
          while (mysqli_stmt_fetch($stmt)) {
              // printf("%s (%s)\n", $id, $loc);
              $locations[$id] = $loc;
          }
          /* close statement */
          mysqli_stmt_close($stmt);
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
                  <input type="time" class="form-control" name="form-text-fname" required value="<?php echo returnDateTimestamp(); ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">End time</label>
                  <input type="time" class="form-control" name="form-text-lname" placeholder="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Severity</label>
              <select id="inputSeverity" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($severity as $key => $value):
                    echo '<option value="'.$key.'">'.$value.'</option>';
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Location</label>
              <select id="inputLocation" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($locations as $key => $value):
                    echo '<option value="'.$key.'">'.$value.'</option>';
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Current Weather</label>
              <select id="inputWeather" class="form-control">
                <option label=" "></option>
                <option value="Sunny">Sunny</option>
                <option value="Cloudy">Cloudy</option>
                <option value="Foggy">Foggy</option>
                <option value="Rainy">Rainy</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Remedy</label>
              <select id="inputLocation" class="form-control">
                <option label=" "></option>
                <?php
                  foreach ($remedies as $key => $value):
                    echo '<option value="'.$key.'">'.$value.'</option>';
                  endforeach;
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Notes</label>
              <textarea class="form-control" id="textareaNotes" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2">Sign up</button>
          </form>

        </div> <!-- END OF .col-7 -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
