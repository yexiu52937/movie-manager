<?php
  
    include "../inc/dbinfo.inc";

    /* Connect to MySQL and select the database. */

    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

    $query = $_GET['title_query'];
    $searchInTitle = "SELECT * FROM Film WHERE titolo LIKE '%".$query."%';";
    $raw_results = mysqli_query($connection, $searchInTitle);
    if ($raw_results === false) {
        echo mysqli_error($connection);
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css"></link>
    <meta charset="utf-8">
  </head>


  <body>

    <form action="search.php" method="GET">
      <input type="text" name="title_query"/>
      <input type="submit" value="Search"/>
    </form>
    <?php if(mysqli_num_rows($raw_results) > 0){
            echo "Search results for '".$query."'.";
            echo "<br>";
        } else {
            echo "No result";
        }
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Year</th>
            <th>Country</th>
            <th>Description</th>
        </tr>
        <?php while($results = mysqli_fetch_array($raw_results)): ?>
        <tr>
            <td><?= $results['titolo']; ?></td>
            <td><?= $results['anno']; ?></td>
            <td><?= $results['nazionalita']; ?></td>
            <td><?= $results['trama']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
  </body>
</html>
