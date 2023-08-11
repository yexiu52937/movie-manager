<?php
  
  include "../inc/dbinfo.inc";

  /* Connect to MySQL and select the database. */
  // $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  $connection = new mysqli(
                DB_SERVER,
                DB_USERNAME,
                DB_PASSWORD
            );

  // if (mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  // $database = mysqli_select_db($connection, DB_DATABASE);

   echo "db selected";
  $connection->query("SELECT * FROM Film;");

  $getFilmTable = "SELECT * FROM Film";

  $results = mysqli_query($connection, $getFilmTable);
  echo "getting results";

  if ($results === false) {
    echo mysqli_error($connection);
  } else {
    $Films = mysqli_fetch_all($results);
    var_dump($Films);
  }
  echo "finish";
?>
