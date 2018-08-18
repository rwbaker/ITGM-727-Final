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


  $allUsers = array();
  // Get all users from DB
  // ----------------------------------------------------------------------------
    // Standard & reusable db connection
    include "../includes/helpers/config.php";

      // Prepare a select statement
      $sql = "SELECT `user_id`, `first_name`, `last_name`, `email`, `created_at` FROM `user` WHERE `user_type` IS NULL";

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
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($allUsers as $data) {
                    echo "<tr>";
                    foreach ($data as $field) {
                        echo "<td>" . $field . "</td>";
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
