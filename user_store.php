<?php

include('../db.php');

if (isset($_POST['email'])) {
  
  $name           = $_POST['name'];
  $email          = $_POST['email'];
  $password       = $_POST['password'];
  $has_warning    = 0;

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

    if(empty($password)) {

      $passwordErr = "password is required";
      $has_warning = 1;
      redirect_form($passwordErr, 'warning');

    }else {

      // check if name only contains letters and whitespace
      if (!strlen($password) > 5) {
        $passwordErr = "At least 5 digits are required";
        $has_warning = 1;
        redirect_form($passwordErr, 'warning');
      }

    }

  
  //Form Validation Ends

  //DB Insert
    /* disable autocommit */
    $conn->autocommit(FALSE);
    
    if($has_warning != 1) {

      $password       = password_hash($password, PASSWORD_DEFAULT);

      $query          = "INSERT INTO `users`(name, email, password) VALUES ('$name', '$email', '$password')";
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

    redirect_form($message, 'success');
  //DB Insert Ends


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

  header('Location: login.php');

}


?>