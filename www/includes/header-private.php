<?php
/**
 * @desc
 * Shared header for entire app
 *
 */

  $button_link = 'add.php';
  $button_text = 'Add Migraine';

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
          <!-- <li class='nav-item active'> -->
            <!-- <a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a> -->
          <!-- </li> -->
          <li class='nav-item'>
            <a class='nav-link' href='../logout.php'>Logout</a>
          </li>
        </ul>

        <?php
        echo "<a href='{$button_link}' class='btn btn-outline-primary my-2 my-sm-0'>{$button_text}</a>";
        ?>

      </div>
    </nav>
  </div>
</div>
