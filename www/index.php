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
  // require_once "includes/helpers/config.php";

  include 'includes/functions/createuser.php';


  // Define variables and initialize with empty values
  $firstname =     $lastname =     $email =     $password = "";
  $firstname_err =  $lastname_err = $email_err = $password_err = "";
  $user_type = null;

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Validate email
      if (empty(trim($_POST["form-text-email"]))) {
          $email_err = "Please enter an email address.";
      } else {
          // Store in var
          $email = $_POST["form-text-email"];
      }

      // Validate first name
      if (empty(trim($_POST["form-text-fname"]))) {
          $firstname_err = "Please enter a first name.";
      } else {
          // Store in var
          $firstname = $_POST["form-text-fname"];
      }

      // Validate last name
      if (empty(trim($_POST["form-text-lname"]))) {
          $lastname_err = "Please enter a last name.";
      } else {
          // Store in var
          $lastname = $_POST["form-text-lname"];
      }

      // Validate password
      if (empty(trim($_POST["form-text-password"]))) {
          $password_err = "Please enter a password.";
      } elseif (strlen(trim($_POST["form-text-password"])) < 6) {
          $password_err = "Password must have at least 6 characters.";
      } else {
          $password = trim($_POST["form-text-password"]);
      }

      // Check input errors before inserting in database
      if (empty($email_err) && empty($password_err)) {
          createUser($firstname, $lastname, $email, $password, $user_type);
      }

      // Close connection
      // mysqli_close($link);
  }

?>

  <!DOCTYPE html>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/main.css">
  <title>Migratrak, ITGM-727</title>
  </head>

  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.bundle.min.js"></script>

    <!-- APP NAV BAR -->
    <?php include 'includes/header.php'; ?>

    <div class="container mb-5 mt-3">

      <!-- Jumbotron -->
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="jumbotron bg-white mb-0 pb-2">
            <h1 class="display-5">Welcome!</h1>
            <p class="lead">
              <strong>Migratrak makes recording a migraine a breeze.</strong>
              If diaries and pen and paper notes no longer work for you,
              Migratrak provides a simple and clean interface.</p>
            <hr class="brain" />
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div id="signup-block" class="col-6 p-4">

          <h1 class="h3 mb-5">Give it a try!</h1>

          <!-- SIGNUP FORM -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <?php include 'includes/signup.php'; ?>
          </form>

        </div> <!-- END OF .col-7 -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->

    <?php include 'includes/footer.php'; ?>
  </body>

  </html>
