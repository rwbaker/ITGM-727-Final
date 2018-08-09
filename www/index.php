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

  include 'includes/timestamp.php';


?>

  <!DOCTYPE html>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.css">
  <title>Exercise 2, ITGM-727</title>
  </head>

  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- APP NAV BAR -->
    <?php include 'includes/header.php'; ?>

    <div class="container">


      <div class="row justify-content-center mt-5 mb-3">
        <div class="col-5">
          <p class="text-secondary"><strong>Welcome to the Guestbook!</strong><br />
            <?php
              // Change our welcome message base of if there are entries or not...
              if (empty($entries)) {
                echo "Please look around, and be the first to sign our guestbook.";
              } else {
                echo "Explore other's comments, or make one yourself.";
              }
            ?>

          </p>
        </div>
      </div>

      <?php

      // Loop thru entry data
      foreach ($entries as $entryItem) {

        /**
        * $entryItem[0] - Name
        * $entryItem[1] - Email
        * $entryItem[2] - Create date
        * $entryItem[3] - Guestbook message
        * $entryItem[4] - Image path
        */

        // Check for image avatar
        if (isset($entryItem[4])) {

          // If it exists, store in variable
          $avatarImagePath = $entryItem[4];
          $initials = '';
        } else {

          // If not, get initials of Name...
          $avatarImagePath = '';

          // Pull first letter from each word. Use this to get user's initials. Returns array.
          preg_match_all("/[A-Z]/", ucwords(strtolower($entryItem[0])), $matches);
          // convert array to string
          $initials = implode("", $matches[0]);
        }

        // Print data in comment HTML template
        echo "
        <!-- COMMENT -->
        <div class='row'>
          <div class='col'>
            <div class='comment shadow-sm p-3 mb-5 bg-white rounded'>
              <div class='container'>
                <div class='row'>
                  <div class='col-2 d-sm-none d-md-block'>
                    <div class='avatar' style='background-image:url($avatarImagePath)'>$initials</div>
                  </div>
                  <div class='col'>
                    <div class='row'>
                      <div class='col name'>
                        <a href='mailto:$entryItem[1]'>$entryItem[0]</a>
                        <span class='low-priority-text'>says</span></div>
                      <div class='col date text-muted'>$entryItem[2]</div>
                    </div> <!-- END OF name/date row -->
                    <div class='comment-body text-secondary mt-2'>
                      $entryItem[3]
                    </div>
                  </div>
                </div><!-- END OF .comment .container .row -->
              </div><!-- END OF .comment .container -->
            </div><!-- END OF .comment -->
          </div><!-- END OF .col -->
        </div><!-- END OF .row -->";

      }

      ?>

    </div> <!-- END OF .contaner -->
  </body>

  </html>
