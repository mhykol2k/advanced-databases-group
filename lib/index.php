<!DOCTYPE html>

<!-- Stylesheet and Assets -->

<html>
    <head>
      <title>PHP Assignment</title>
      <link rel="stylesheet" href="../assets/main.css">
      <link rel="icon" href="../media/globe-icon.png">
      <style>
      table, th, td {
          border: 1px solid black;
      }
      </style>
    </head>
    <main>

<!-- Navigation bar -->

          <div class="sidenav">
            <h2 class="title">🛖Home Page</h2>
            <a href="new_record.php">Add New Record</a>
            <a href="manager.php">Edit Tables</a>
          </div>

          <div class="sidenavlinks">
            <a href="https://github.com/mm1089/advanced-databases-group/">GitHub</a>
            <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md">Read the Docs</a>
          </div>
          <div class="content">
            <h1>🛖</h1>
            <h2>Homepage</h2>
            <div>
              <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md#prerequisites">How to use this service</a>
            </div>
            <br>

            <div class="php">
      <?php
        // connect to db
        require './db_connection.php';
        // prepping sql query
        $sql = "SELECT EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO FROM EMP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>EMPNO</th><th>Name</th><th>Job</th><th>Mgr</th><th>Hire Date</th><th>Salary</th><th>Commision</th><th>Department number</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["EMPNO"]. "</td><td>" . $row["ENAME"]. "</td><td>" . $row["JOB"]. 
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
          </div>
    </main>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->