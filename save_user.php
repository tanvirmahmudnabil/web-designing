<?php

include('db.php');

if (isset($_POST['save_user'])) {
  
  $name           = $_POST['name'];
  $email          = $_POST['email'];
  $about          = $_POST['about'];
  $has_warning      = 0;

  //Form Validation Starts
    
    if(empty($name)) {

      $nameErr = "Name is required";
      $has_warning = 1;
      redirect_form($nameErr, 'warning');

    }else {
      
      $name = form_input($name);

      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
        $has_warning = 1;
        redirect_form($nameErr, 'warning');
      }

    }
    
    if(empty($email)) {

      $emailErr = "Email is required";
      $has_warning = 1;
      redirect_form($emailErr, 'warning');

    } else {

      $email = form_input($email);
      
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $has_warning = 1;
        redirect_form($emailErr, 'warning');
      }

    }

  //Form Validation Ends

  /* disable autocommit */
  $conn->autocommit(FALSE);
  
  if($has_warning != 1) {

    $query          = "INSERT INTO `user-info`(name, email, about_user) VALUES ('$name', '$email', '$about')";
    $result         = mysqli_query($conn, $query);
    
    if(!$result) {
      
      /* Rollback */
      $conn->rollback();

      die("User Added Failed. Please Try Again." . $result->error);
    }

  }

  /* commit insert */
  $conn->commit();

  $message = "User Added Successfully.";

  redirect_form($nameErr, 'success');

}

//Form Data Sanitize
function form_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function redirect_form($message, $type){

  $_SESSION['message']          = $message;
  $_SESSION['message_type']     = $type;

  header('Location: index.php');

}

?>
