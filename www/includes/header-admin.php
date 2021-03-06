<?php
/**
 * @desc
 * Shared header for entire app
 *
 */

 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
     // header("location: login.php");
     // exit;

     $button_link = 'login.php';
     $button_text = 'Login';
 } else {
     // print_r($_SESSION);
     $button_link = 'adduser.php';
     $button_text = 'Add User';
 }

?>
<div class='navbar-wrapper shadow-sm bg-white'>
  <div class='container'>
    <nav class='navbar navbar-expand-lg px-0 navbar-light bg-white rounded'>
      <a class='navbar-brand mb-0 h1' href='index.php'>Migratrak</a>
      <!-- Automagical hamburger meunu button at smaller viewports -->
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <!-- Nav bar links -->
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
          <?php

            if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true) {
                echo "<li class='nav-item'><a class='nav-link' href='../logout.php'>Logout</a></li>";
            }

          ?>
        </ul>

        <?php
        echo "<a href='{$button_link}' class='btn btn-outline-primary my-2 my-sm-0'>{$button_text}</a>";
        ?>

      </div>
    </nav>
  </div>
</div>
