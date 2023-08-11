<?php

  echo "test";
  
  include "../inc/dbinfo.inc";

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  echo "connecting";

  if (mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

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
