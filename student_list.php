<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  $_SESSION['message'] = "Please log in.";
  header("Location: login.php");
  exit();
}

$whole_file = trim(file_get_contents('students.dat'));
$students = explode("\n", $whole_file);

?>
<html>
  <head>
    <link rel="stylesheet" href="login.css">
  </head>
<body>
<span id="logout"><a href="logout.php">Logout</a></span>
<ul>
<?php
foreach ($students as $student) {
  $parts = explode("|", $student); ?>
  <li>
  <a href="detail.php?id=<?php echo $parts[0]; ?>"><?php echo $parts[1]; ?></a>
  </li>
<?php
  }
?>
</ul>
</body>
</html>

