<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'importuser', 'secret', 'radius');

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM radius.rm_managers WHERE managername='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['managername'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: upload.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>