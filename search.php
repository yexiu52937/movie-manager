<?php
  
    include "../inc/dbinfo.inc";

    /* Connect to MySQL and select the database. */

    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

    // $database = mysqli_select_db($connection, DB_DATABASE);

//   $getFilmTable = "SELECT * FROM Film";

//   $results = mysqli_query($connection, $getFilmTable);

//   if ($results === false) {
//     echo mysqli_error($connection);
//   } else {
//     $Films = mysqli_fetch_all($results);
//     var_dump($Films);
//   }

    $query = $_GET['title_query'];
    $searchInTitle = "SELECT * FROM Film WHERE titolo LIKE '%".$query."%';";
    $raw_results = mysqli_query($connection, $searchInTitle);
    if ($raw_results === false) {
        echo mysqli_error($connection);
    } else {
        if(mysqli_num_rows($raw_results) > 0){
            echo "Searching".$query;
            echo "<br>";
        }
    }
	// 		while($results = mysqli_fetch_array($raw_results)){
	// 			echo $results['titolo']."|".$results[];
	// 		}
	// 	}
	// 	else{
	// 		echo "No results";
	// 	}
    // }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Search Results</title>
    <meta charset="utf-8">
  </head>

  <body>
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