<!-- MySQL connection for rbaker22 -->
<!-- Website url http://studentpages.scad.edu/~rbaker22 -->

<?php
  // mysql_connect('atl-stu-mysql.scad.edu','rbaker22','1b829cbaf8731c78b94cff555c9bc471b8e51016');
  // mysql_select_db('rbaker22');

  // $servername = "atl-stu-mysql.scad.edu";
  // $username = "rbaker22";
  // $password = "1b829cbaf8731c78b94cff555c9bc471b8e51016";
  // $dbname = "rbaker22";

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "migratrak";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = file_get_contents('db.sql');
  // $query = $db->exec($sql);

  if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
  } else {
      echo "Error creating table: " . mysqli_error($conn);
  }

  mysqli_close($conn);

  $conn->close();

?>
