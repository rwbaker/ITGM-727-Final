<?php

  /* Database credentials. */
  $DB_SERVER= "localhost";
  $DB_USERNAME = "root";
  $DB_PASSWORD = "root";
  $DB_NAME = "migratrak";

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
