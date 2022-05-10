<!DOCTYPE html>
<html>
    <head>
        <title>Add New Record</title>
        <link rel="stylesheet" href="../assets/main.css">
        <link rel="icon" href="../media/globe-icon.png">
    </head>

<script>
    function addRecord() {
        <?php
        // Create the connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // check form is submitted
        if(isset($_POST['submit']))
        {    
            // get form inputs
            $EMPNO = $_GET['EMPNO'];
            $ENAME = $_GET['ENAME'];
            $JOB = $_GET['JOB'];
            $MANAGER = $_GET['MANAGER'] 
            $HIREDATE = $_GET['HIREDATE']
            $SAL = $_GET['SAL']
            $COMM = $_GET['COMM']
            $DEPTNO = $_GET['DEPTNO']

            // validating inputs
            if($EMPNO=="" || $ENAME=="" || $JOB=="" || $MANAGER=="" || $HIREDATE=="" || $SAL==""
            || $COMM=="" || $COMM=="" || $DEPTNO==""){
                // throwing error if fields empty
                die("Missing field inputs")
            }

            // preparing the query
            $sql = "INSERT INTO emp (EMPNO,ENAME,JOB,MANAGER,HIREDATE,SAL,COMM,DEPTNO)
            VALUES ('$EMPNO','$ENAME','$JOB','$MANAGER','$HIREDATE','$SAL','$COMM','$DEPTNO')";

            // checking insert query worked
            if (mysqli_query($conn, $sql)) {
                alert("New record has been added successfully !");
            } else {
                $error="Error: " . $sql . ":-" . mysqli_error($conn);
                alert($error);
            }
            mysqli_close($conn);
        }
        ?>
    }
</script>

<!-- Main Section for Implementation -->
<!-- Information on assignment etc. -->
    <main>
        <body>
<!-- Navigation bar -->
        <div class="sidenav">
            <h2 class="title">➕New Record</h2>
            <a href="index.php">Return to Home</a>
            <a href="https://github.com/mm1089/advanced-databases-group">GitHub</a>
            <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md">Read the Docs</a>
        </div>
        <div class="content">
            <h1>➕Create new Record➕</h1>
            <h5>You can create new records here</h5>
            <h5>Simply fill in the boxes below and submit!</h5>
        </div>
<!-- EMP (EMPNO, ENAME, JOB, MGR#, HIREDATE, SAL, COMM, DEPTNO#) -->
        <div class="content">
            <form class="form" action="index.php" method="post">
                <br>
                <!-- <label class="form" for="EMPNO">EMPNO:</label> -->
                <input class="form" type="number" id="EMPNO" name="EMPNO" placeholder="Employee Number">
                <br>
                <!-- <label class="form" for="ENAME">ENAME:</label> -->
                <input class="form" type="text" id="ENAME" name="ENAME" placeholder="Employee Name">
                <br>
                <!-- <label class="form" for="JOB">JOB:</label> -->
                <input class="form" type="text" id="JOB" name="JOB" placeholder="Job">
                <br>
                <!-- <label class="form" for="MANAGER">MANAGER:</label> -->
                <input class="form" type="text" id="MANAGER" name="MANAGER" placeholder="Manager">
                <br>
                <!-- <label class="form" for="HIREDATE">HIREDATE:</label> -->
                <input class="form" type="date" id="HIREDATE" name="HIREDATE" placeholder="dd/MM/yyyy">
                <br>
                <!-- <label class="form" for="SAL">SALARY:</label> -->
                <input class="form" type="number" id="SAL" name="SAL" placeholder="Salary">
                <br>
                <!-- <label class="form" for="COMM">COMMISION:</label> -->
                <input class="form" type="number" id="COMM" name="COMM" placeholder="Commision">
                <br>
                <!-- <label class="form" for="DEPTNO">DEPTNO:</label> -->
                <input class="form" type="number" id="DEPTNO" name="DEPTNO" placeholder="Department Number">
                <br>
                <input type="submit" onclick="addRecord()">
                <br>
            </form>
        </div>

<!-- End of Body -->
        </body>
    </main>

    <footer class="footer">
        <br>
        <a class="footer-text" href="https://github.com/mm1089/advanced-databases-group">This project is available on GitHub:</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </svg>
        <div class="authors">
            <p>Collaborators: Michael McLain, William Castleman and Jure Sunic.</p>
        </div>
        </p>
    </footer>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->