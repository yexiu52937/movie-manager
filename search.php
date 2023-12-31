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
    </style>
  </head>


  <body>

    <div class="mt-2 d-flex justify-content-center">
      <form action="search.php" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="col-12">
          <div class="input-group">
            <input type="text" name="title_query" class="form-control" placeholder="Movie title">
          </div>
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

    <div class="d-flex justify-content-center">
      <?php if(mysqli_num_rows($raw_results) > 0){
              echo "Search results for '".$query."'.";
              echo "<br>";
          } else {
              echo "No result";
          }
      ?>
    </div>
<div>
    <table id="result-table" class="table table-bordered table-striped-columns table-hover" style="width: 90%; margin-left: auto; margin-right: auto;">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Year</th>
            <th scope="col">Country</th>
            <th scope="col">Description</th>
	</tr>
	<tbody class="table-group-divider">
        <?php while($results = mysqli_fetch_array($raw_results)): ?>
        <tr>
            <td><?= $results['titolo']; ?></td>
            <td><?= $results['anno']; ?></td>
            <td><?= $results['nazionalita']; ?></td>
            <td><?= $results['trama']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
  </body>
</html>
