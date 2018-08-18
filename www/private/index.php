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
  include "../includes/functions/createmigraine.php";

// Initialize the session
session_start();

// Check if user is logged in, if not then redirect
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    print_r($_SESSION);
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Create variables
    $data_start = $data_end = $data_severity = $data_location = "";
    $data_weather = $data_remedy = $data_notes = "";

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


    if (!empty($_SESSION["id"])) {
        createMigraine($_SESSION["id"], $data_start, $data_end, $data_severity, $data_location, $data_weather, $data_remedy, $data_notes);
    }
}

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
    <?php include '../includes/header-private.php'; ?>

    <div class="container mb-5 mt-3">

      <div class="row">
        <div class="col">

          <h1 class="h3 mt-5 mb-3">Your Migraines</h1>
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
