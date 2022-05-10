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

        <body class="">
          <div class="sidenav">
            <h2 class="title">📍Home Page</h2>
            <a href="new_record.php">Add New Record</a>
            <a href="manager.php">Edit Tables</a>
            <a href="https://github.com/mm1089/advanced-databases-group/">GitHub</a>
            <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md">Read the Docs</a>
          </div>
          <div class="content">
            <h1>📍Advanced Databases Group Project - PHP Home Page📍</h1>

            <div class="php">
      <?php
        $servername = "localhost";
        $username = "default_user";
        $password = "password";
        $dbname = "assignment";

// Create the connection

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


// Check connection

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connection successful";

        $sql = "SELECT EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO FROM emp";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>EMPNO</th><th>Name</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["EMPNO"]. "</td><td>" . $row["ENAME"]. "</td><td>" . $row["JOB"]. 
                "</td></tr>" . $row["MGR"]. "</td></tr>" . $row["HIREDATE"]. "</td></tr>" . $row["SAL"]. "</td></tr>" 
                . $row["COMM"]. "</td></tr>" . $row["DEPTNO"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
      ?>

            <div>
              <h5>You can read about how to use this service:</h5>
              <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md">Here</a>
            </div>
          </div>
        </body>
    </main>

<!-- Footer Segment -->

    <footer class="footer">
      <br>
      <a class="footer-text" href="https://github.com/mm1089/advanced-databases-group">This project is available on GitHub:</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </svg>
        <div class="authors">
          <p>Collaborators: Michael McLain, William Castleman and Jure Sunic.</p>
        </div>
    </footer>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->