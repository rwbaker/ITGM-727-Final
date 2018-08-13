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
        <div class="col-6 p-4">

          <h1 class="h3 mt-5 mb-3">Edit Migraine</h1>

          <!-- SIGNUP FORM -->
          <form action="index.php" method="post" enctype="multipart/form-data">

            <div class="row mb-0">
              <div class="col">

                <div class="form-group">
                  <label for="">Start time</label>
                  <input type="time" class="form-control" name="form-text-fname" required>
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
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Location</label>
              <select id="inputLocation" class="form-control">
                <option>Front</option>
                <option>Front left</option>
                <option>Front right</option>
                <option>Back</option>
                <option>Back left</option>
                <option>Back right</option>
                <option>Right</option>
                <option>Left</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">Current Weather</label>
              <select id="inputWeather" class="form-control">
                <option>Sunny</option>
                <option>Cloudy</option>
                <option>Foggy</option>
                <option>Rainy</option>
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
