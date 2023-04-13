<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "dbcrud");
$edit = $_GET['edit'];

if (isset($_POST['submit'])) {
  $name = $_POST['name1'];
  $address = $_POST['address1'];
  $mobile = $_POST['mobile1'];

  $sql = "update student set name = '$name',address = '$address', mobile='$mobile' where id = '$edit'";

  if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("index.php")</script>';
  } else {
    echo "Something Error" . $connection->error;
  }
} else {
  $sql = "select * from student where id = '$edit'";

  $run = mysqli_query($connection, $sql);

  if ($row = mysqli_fetch_array($run)) {
    $uid = $row['id'];
    $name = $row['name'];
    $address = $row['address'];
    $mobile = $row['mobile'];
  }
}
?>









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
            <form action="edit.php?edit=<?php echo $edit ?>" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name1" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address1" class="form-control" placeholder="Enter Address" value="<?php echo $address ?>">
              </div>
              <div class="form-group">
                <label>Mobile</label>
                <input type="number" name="mobile1" class="form-control" placeholder="Enter Mobile" value="<?php echo $mobile ?>">
              </div>
              <br>
              <input type="submit" class="btn btn-primary" name="submit" Value="Edit">
            </form>

          </div>
        </div>


      </div>


    </div>


  </div>
</body>

</html>