<?php
session_start();

///echo "<pre>" . print_r($_FILES,1) . "</div>";
$imagePath = "";
if (count($_FILES) > 0) {
  if ($_FILES["file"]["error"] > 0) {
    throw new Exception("Error: " . $_FILES["file"]["error"]);
  } else {
    $basePath = "/Users/crk/projects/cs401/src/www";
    $imagePath = "/uploads/" . $_FILES["file"]["name"];
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $basePath . $imagePath)) {
      throw new Exception("File move failed");
    }
  }
}
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$valid = true;
$messages = array();
if (empty($username)) {
  $messages[] = "Please enter a username";
  $valid = false;
}

if ($password1 != $password2) {
  $messages[] = "Passwords dont match";
  $valid = false;
}

if (!$valid) {
    $_SESSION['messages'] = $messages;
    $_SESSION['form_input'] = $_POST;
    header("Location: create_user.php");
    exit();
}

//echo "CONGRATS YOU CREATE A USER";
require_once 'Dao.php';
$dao = new Dao();
// insert stuff into a user table in the database..
$dao->createUser ($username, $password, $imagePath);
header("Location: welcome.php");

exit;
?>
