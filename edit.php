<?php

include("db.php");

$name             = '';
$email            = '';
$about            = '';

if (isset($_GET['id'])) {

  $id             = $_GET['id'];
  
  $query          = "SELECT * FROM `user-info` WHERE id = $id";
  $result         = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) == 1) {

    $row          = mysqli_fetch_array($result);
    
    $name         = $row['name'];
    $email        = $row['email'];
    $about        = $row['about_user'];

  }

}

if (isset($_POST['update'])) {
  
  $id           = $_GET['id'];
  $name         = $_POST['name'];
  $email        = $_POST['email'];
  $about        = $_POST['about'];

  $query        = "UPDATE `user-info` set name = '$name', email = '$email', about_user = '$about' WHERE id = $id";
  $result       = mysqli_query($conn, $query);
    
  if(!$result) {
    die("User Updated Failed. Please Try Again." . $result->error);
  }

  $_SESSION['message']        = 'User Updated Successfully';
  $_SESSION['message_type']   = 'warning';
  header('Location: index.php');

}

?>

<?php include('includes/header.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">

        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="User Name" value="<?php echo $name; ?>" autofocus required>
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="User Email" value="<?php echo $email; ?>" required>
          </div>
          
          <div class="form-group">
            <textarea name="about" cols="30" rows="10" class="form-control" placeholder="About User"><?php echo $about;?></textarea>
          </div>
          
          <button class="btn-success" name="update">Update User</button>

        </form>

      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
