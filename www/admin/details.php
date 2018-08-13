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
    <?php include '../includes/header.php'; ?>

    <div class="container mb-5 mt-3">

      <div class="row">
        <div id="migraine-details" class="col">

          <h1 class="h3 mt-5 mb-3">Migraine #0000-00</h1>

          <!-- DATA -->
          <div class="row border-top border-bottom py-3">
            <div class="col-2">Duration</div>
            <div class="col-10">4 hours<br />
              <span class="text-muted">10:00am - 2:00pm</span>
              <!-- <button type="button" class="btn btn-outline-primary btn-sm ml-3">Edit Migraine</button> -->
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Severity</div>
            <div class="col-10">4 <span class="text-muted">out of</span> 10</div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Location</div>
            <div class="col-10">Front</div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Current Weather</div>
            <div class="col-10">Cloudy</div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Remedy</div>
            <div class="col-10">
              Ibuprofen <span class="text-muted">taken at</span> 4:00pm<br />
              Imatrex <span class="text-muted">taken at</span> 6:00pm
            </div>
          </div>

          <div class="row border-bottom py-3">
            <div class="col-2">Notes</div>
            <div class="col-6">Class taciti bibendum porta nisl ad venenatis nunc senectus malesuada, ridiculus vel tincidunt euismod quam ultricies habitant penatibus ullamcorper curabitur, aptent finibus fringilla lacus elit leo platea blandit.</div>
          </div>

        <div class="row mt-4 mb-4">
          <!-- <button type="button" class="btn btn-primary mr-3">Edit</button> -->
          <!-- <button type="button" class="btn btn-outline-danger">Danger</button> -->
        </div>

        </div> <!-- END OF .col -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include '../includes/footer.php'; ?>
  </body>

  </html>
