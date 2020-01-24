<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<?php 
	if(!isset($_SESSION['user_id'])){
		header('Location: signin/login.php');
	}
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) {?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD NEW USER -->
      <div class="card card-body">

        <form action="save_user.php" method="POST">

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="User Name" value="" autofocus required>
          </div>

          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="User Email" value="" required>
          </div>
          
          <div class="form-group">
            <textarea name="about" rows="2" class="form-control" placeholder="About User"></textarea>
          </div>
          
          <input type="submit" name="save_user" class="btn btn-success btn-block" value="Add User">

        </form>

      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>

          <?php
            $query        = "SELECT * FROM `user-info`";
            $result_users = mysqli_query($conn, $query);

            if(mysqli_num_rows($result_users) > 0) {    

              while($row = mysqli_fetch_assoc($result_users)) { ?>
              
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                  </a>
                  <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>

          <?php

              }

            }else { ?>

              <tr>
                <td colspan="4" style="text-align: center; font-weight: bold;">No User Exists Yet</td>
              </tr>

          <?php 
                  } 
          ?>

        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
