<!DOCTYPE html>
<html>
  <head>
    <title>Movie Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="utf-8">
  </head>

  <body>
    <form action="search.php" method="GET" class="row row-cols-lg-auto g-3 align-items-center">
      <div class="col-12">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Movie title" name="title_query"/>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>
  </body>
</html>
