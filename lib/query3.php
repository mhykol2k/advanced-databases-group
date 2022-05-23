<!DOCTYPE html>
<html>
    <head>
        <title>Add New Record</title>
        <link rel="stylesheet" href="../assets/main.css">
        <link rel="icon" href="../media/globe-icon.png">
    </head>
<!-- Navigation bar -->
    <main>
          <div class="sidenav">
            <a href="index.php">Return to Home</a>
            <a href="new_record.php">Add New Employee Record</a>
            <a href="new_record_department.php">Add New Department Record</a>
            <a href="query1.php">Query 1</a>
            <a href="query2.php">Query 2</a>
            <a href="query3.php">Query 3</a>
          </div>
          <div class="sidenavlinks">
            <a href="https://github.com/mm1089/advanced-databases-group/">GitHub</a>
            <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md">Read the Docs</a>
          </div>
        <body>
            <div class="content">
                <h1>Query 3 - Number of Employees Working in Each Location</h1>
                <br>
            <div class="php">
      <?php
// Connect to db
        require './db_connection.php';
// Prepping sql query
        $sql = "SELECT D.LOC,
                       (SELECT Count(E.EMPNO)
                        FROM assignment.EMP E
                        INNER JOIN assignment.DEPT D2 on D2.DEPTNO=E.DEPTNO
                        WHERE D2.LOC=D.LOC) as EmployeeCount
                FROM assignment.DEPT D
                ORDER BY EmployeeCount DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='2' width='500' cellspacing='0'><tr bgcolor='grey'>
            <th>Department Location</th><th>Number of Employee</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr bgcolor='cadetblue'><td>" . $row["LOC"]. "</td><td>" . $row["EmployeeCount"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
      ?>
      <br>
            
            </div>
        </body>
    </main>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->