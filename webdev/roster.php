<html>
  <head>
    <title>Webdev Homepage</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Web Dev Course Student Roster</h1>
    <?php include "nav.php"; ?>
    <div id="content">
       <table>
        <?php
         ?>
        <thead>
          <tr>
            <th>Name</th>
            <th>Major</th>
            <th>Year</th>
            <th>Favorite Icecream</th>
          </tr>
        </thead>
        <tbody>
        <?php
          include "table.php";
          renderTableContents();
        ?>
      </table>
    </div>
  </body>
</html>
