<h1>Student Detail</h1>
<?php
$whole_file = trim(file_get_contents('students.dat'));
$students = explode("\n", $whole_file);

foreach ($students as $student) {
  $parts = explode("|", $student);
  if ($parts[0] == $_GET['id']) {
    echo "<pre>" . print_r($parts, 1) . "</pre>";
    break;
  }
}

