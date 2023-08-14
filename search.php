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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="utf-8">
    <style>
      .row-center{
          text-align:center;
          margin-top: 120px;
      }
    </style>
  </head>


  <body>

    <form action="search.php" method="GET" class="row row-cols-lg-auto g-3 align-items-center row-center">
      <div class="form-group">
        <div class="col-12">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Movie title" name="title_query"/>
          </div>
        </div>
  
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
    
    <?php if(mysqli_num_rows($raw_results) > 0){
            echo "Search results for '".$query."'.";
            echo "<br>";
        } else {
            echo "No result";
        }
    ?>
    <table id="result-table">
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
