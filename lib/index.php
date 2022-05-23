<!DOCTYPE html>
<!-- Stylesheet and Assets -->
<html>
    <head>
      <title>PHP Assignment</title>
      <link rel="stylesheet" href="../assets/main.css">
      <link rel="icon" href="../media/globe-icon.png">
      <style>
      table, th, td {
          border: 2px solid black;
          background-color: white;
          padding: 2px;
      }
      </style>
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
          <div class="content">
            <h1>📋</h1>
            <h1>View Tables</h1>
            <br>
            <h2>List of the employees and their details</h2>
            <div class="php">
      <?php
// Connect to db
        require './db_connection.php';
// Prepping sql query
        $sql = "SELECT EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO FROM EMP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='2' width='1000' cellspacing='0'><tr bgcolor='grey'><th>EMPNO</th><th>Name</th><th>Job</th><th>Mgr</th><th>Hire Date</th><th>Salary</th><th>Commision</th><th>Department number</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr bgcolor='cadetblue'><td>" . $row["EMPNO"]. "</td><td>" . $row["ENAME"]. "</td><td>" . $row["JOB"]. 
                "</td><td>" . $row["MGR"]. "</td><td>" . $row["HIREDATE"]. "</td><td>" . $row["SAL"]. "</td><td>" 
                . $row["COMM"]. "</td><td>" . $row["DEPTNO"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
      ?>
      <br>
      <br>
      <br>
      <br>
      <h2>List of the employees and their details</h2>
      <?php
// Connect to db
        require './db_connection.php';
// Prepping sql query
        $sql = "SELECT DEPTNO, DNAME, LOC FROM DEPT";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='2' width='1000' cellspacing='0'><tr bgcolor='grey'><th>Depratment Number</th><th>Department Name</th><th>Location</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr bgcolor='cadetblue'><td>" . $row["DEPTNO"]. "</td><td>" . $row["DNAME"]. "</td><td>" . $row["LOC"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
      ?>
      <br>
      </div>
    </main>
</html>
<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->