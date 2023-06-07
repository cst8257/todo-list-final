<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <main class="container">
    <div class="row">
      <div class="col col-md-8 col-lg-6 offset-md-2 offset-lg-3">
        <h1 class="display-4 p-5 text-center">ToDo List</h1>
        <form method="post" class="input-group mb-3">
          <input type="text" class="form-control" name="task" placeholder="Add a new task">
          <button type="submit" class="btn btn-outline-secondary">Add</button>
        </form>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between p-3">
            <form method="post" class="w-100 me-3">
              <input type="text" class="form-control" name="task" value="Buy Milk">
            </form>
            <form method="post">
              <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </main>
</body>
</html>