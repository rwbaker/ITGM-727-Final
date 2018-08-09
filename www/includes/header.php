<?php
/**
 * @desc
 * Shared header for entire Guestbook app
 * 
 */
?>
<div class="navbar-wrapper">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand mb-0 h1" href="index.php">📘 Guestbook</a>
      <!-- Automagical hamburger meunu button at smaller viewports -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Nav bar links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <a href="create.php" class="btn btn-outline-primary my-2 my-sm-0">Sign the 'book!</a>
      </div>
    </nav>
  </div>
</div>
