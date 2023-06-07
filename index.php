<?php
  $dsn = "mysql:host=localhost;dbname=todo_list";
  $username = "root";
  $password = "root";

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Error connecting to database: $error_message";
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch($_POST['action']) {
      case 'add':
        $task = $_POST['task'];
        $sql = "INSERT INTO items (task) VALUES (:task)";
        $statement = $db->prepare($sql);
        $statement->execute([':task' => $task]);
        break;
      case 'update':
        $id = $_POST['id'];
        $task = $_POST['task'];
        $sql = "UPDATE items SET task = :task WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->execute([':task' => $task, ':id' => $id]);
        break;
      case 'delete':
        $id = $_POST['id'];
        $sql = "DELETE FROM items WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->execute([':id' => $id]);
        break;
    }
  }

  $sql = "SELECT * FROM items";
  $result = $db->query($sql);
  $items = $result->fetchAll();
?>

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
          <input type="hidden" name="action" value="add">
          <input type="text" class="form-control" name="task" placeholder="Add a new task">
          <button type="submit" class="btn btn-outline-secondary">Add</button>
        </form>
        <ul class="list-group">
          <?php foreach ($items as $item) : ?>
            <li class="list-group-item d-flex justify-content-between p-3">
              <form method="post" class="w-100 me-3">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?? '' ?>">
                <input type="text" class="form-control" name="task" value="<?php echo $item['task'] ?? '' ?>">
              </form>
              <form method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $item['id'] ?? '' ?>">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </main>
</body>
</html>