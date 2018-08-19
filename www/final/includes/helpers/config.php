<?php

  /* Database credentials. */
  $DB_SERVER= "atl-stu-mysql.scad.edu";
  $DB_USERNAME = "rbaker22";
  $DB_PASSWORD = "1b829cbaf8731c78b94cff555c9bc471b8e51016";
  $DB_NAME = "rbaker22";

  // /* Database credentials. */
  // $DB_SERVER= "localhost";
  // $DB_USERNAME = "root";
  // $DB_PASSWORD = "root";
  // $DB_NAME = "migratrak";

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
