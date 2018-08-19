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

  // include 'includes/functions/authuser.php';

  // Initialize the session
  // session_start();
  // print_r("first load: " . $_SESSION);

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      // print_r("initial load, inside" . $_SESSION);
      header("location: /~rbaker22/final/private/index.php");
      exit;
  }

  // Include config file
  require_once "includes/helpers/config.php";

  // Define variables and initialize with empty values
  $email = $password = "";
  $email_err = $password_err = "";

  // Processing form data when form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Check if username is empty
      if (empty(trim($_POST["form-text-email"]))) {
          $email_err = "Please enter your email.";
      } else {
          $email = trim($_POST["form-text-email"]);
      }

      // Check if password is empty
      if (empty(trim($_POST["form-text-password"]))) {
          $password_err = "Please enter your password.";
      } else {
          $password = trim($_POST["form-text-password"]);
      }

      // Validate credentials
      if (empty($email_err) && empty($password_err)) {
          // Prepare a select statement
          $sql = "SELECT user_id, first_name, last_name, email, password_hash, user_type FROM user WHERE email = ?";

          if ($stmt = mysqli_prepare($link, $sql)) {
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "s", $param_email);

              // Set parameters
              $param_email = $email;

              // Attempt to execute the prepared statement
              if (mysqli_stmt_execute($stmt)) {
                  // Store result
                  mysqli_stmt_store_result($stmt);

                  // Check if username exists, if yes then verify password
                  if (mysqli_stmt_num_rows($stmt) == 1) {
                      // Bind result variables
                      mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $email, $hashed_password, $user_type);
                      if (mysqli_stmt_fetch($stmt)) {
                          if (password_verify($password, $hashed_password)) {
                              // Password is correct, so start a new session
                              session_start();

                              // Store data in session variables
                              $_SESSION["loggedin"] = true;
                              $_SESSION["id"] = $id;
                              $_SESSION["email"] = $email;
                              $_SESSION["firstname"] = $firstname;
                              $_SESSION["lastname"] = $lastname;
                              $_SESSION["user_type"] = $user_type;

                              print_r($_SESSION);

                              // Redirect user to welcome page
                              if ($user_type == "admin") {
                                  header("location: /~rbaker22/final/admin/index.php");
                              } else {
                                  header("location: /~rbaker22/final/private/index.php");
                              }
                          } else {
                              // Display an error message if password is not valid
                              $password_err = "The password you entered was not valid.";
                          }
                      }
                  } else {
                      // Display an error message if username doesn't exist
                      $email_err = "No account found with that username.";
                  }
              } else {
                  echo "Oops! Something went wrong. Please try again later.";
              }
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }

      // Close connection
      mysqli_close($link);
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

    <div class="container mb-5 mt-5">

      <div class="row justify-content-center">
        <div id="signup-block" class="col-6 p-4">

          <h1 class="h3 mb-5">Log in</h1>

          <!-- SIGNUP FORM -->
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Email address</label>
              <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="form-text-email" required value="<?php echo $email; ?>">
              <div class="invalid-feedback"><?php echo $email_err; ?></div>
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="form-text-password" required placeholder="">
              <div class="invalid-feedback"><?php echo $password_err; ?></div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-lg mt-2">Log in</button>
          </form>

        </div> <!-- END OF .col-7 -->
      </div> <!-- END OF .row -->

    </div> <!-- END OF .contaner -->
    <?php include 'includes/footer.php'; ?>
  </body>

  </html>
