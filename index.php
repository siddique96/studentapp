<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h1>Student Crud Application</h1>
          </div>
          <div class="card-body">
            <button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a> </button>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Mobile</th>
                  <th scope="col">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, "dbcrud");

                $sql = "select * from student";
                $run = mysqli_query($connection, $sql);

                $id = 1;
                while ($row = mysqli_fetch_array($run)) {
                  $uid = $row['id'];
                  $name = $row['name'];
                  $address = $row['address'];
                  $mobile = $row['mobile'];

                ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $mobile ?></td>
                    <td>
                      <button class="btn btn-success"> <a href='edit.php?edit=<?php echo $uid ?>' class="text-light"> Edit </a> </button>
                      <button class="btn btn-success"> <a href='delete.php?del=<?php echo $uid ?>' class="text-light"> Delete </a> </button>
                    </td>

                  </tr>
                <?php $id++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>