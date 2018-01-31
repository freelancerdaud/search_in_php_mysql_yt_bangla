<?php 


$con = new PDO('mysql:dbname=search;host=localhost', 'root', '');
if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $statement = $con->prepare("select * from people where name like :name or email like :email");
  $statement->execute([
    ':name' => '%' . $q .'%',
    ':email' => '%' . $q .'%'
  ]);
} else {
  $statement = $con->prepare('select * from people');
  $statement->execute();
}
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search</title>
  <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2>All people </h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form class="my-4">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="search....">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-outline-info">Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <th>Email</th>
          </tr>
          <?php foreach($people as $person): ?>
            <tr>
              <td><?php echo $person->name; ?></td>
              <td><?php echo $person->email; ?></td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>
    </div>
  </div>
</body>
</html>