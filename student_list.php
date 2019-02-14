<?php
$whole_file = trim(file_get_contents('students.dat'));
$students = explode("\n", $whole_file);

?>
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
