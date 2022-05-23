<!DOCTYPE html>
<html>
    <head>
        <title>Add New Department Record</title>
        <link rel="stylesheet" href="../assets/main.css">
        <link rel="icon" href="../media/globe-icon.png">
    </head>
<!-- Fucntion to redirect users after creating new record -->
    <script>
        function addRecord() {
            alert("✅ Record added successfully ✅");
            location.replace("./index.php");
        }
    </script>
<!-- Navigation bar -->
    <main>
        <body>
        <div class="sidenav">
            <a href="index.php">Return to Home</a>
            <a href="new_record.php">Add New Record</a>
            <a href="query1.php">Query 1</a>
            <a href="query2.php">Query 2</a>
            <a href="query3.php">Query 3</a>
        <div class="sidenavlinks">
            <a href="https://github.com/mm1089/advanced-databases-group/">GitHub</a>
            <a href="guide.php">Installation Guide</a>
            <a href="https://github.com/mm1089/advanced-databases-group/blob/main/README.md#prerequisites">Read the Docs</a>
        </div>
        </div>
        <div class="content">
            <h1>✍️</h1>
            <h1>Create a new record</h1>
        </div>
<!-- Input Form -->
        <div class="content">
            <form class="form" method="POST">
                <br>
                <label class="form" for="EMPNO">Employee Number:</label>
                <input class="form" type="number" id="EMPNO" name="EMPNO" placeholder="Employee Number" required>
                <br>
                <label class="form" for="ENAME">Employee Name:</label>
                <input class="form" type="text" id="ENAME" name="ENAME" placeholder="Employee Name" required>
                <br>
                <label class="form" for="JOB">Job:</label>
                <input class="form" type="text" id="JOB" name="JOB" placeholder="Job" required>
                <br>
                <label class="form" for="MANAGER">Manager:</label>
                <input class="form" type="text" id="MANAGER" name="MANAGER" placeholder="Manager">
                <br>
                <label class="form" for="HIREDATE">Hire Date:</label>
                <input class="form" type="date" id="HIREDATE" name="HIREDATE" placeholder="dd/MM/yyyy" min="1940-01-01" min="2100-01-01" required>
                <br>
                <label class="form" for="SAL">Salary:</label>
                <input class="form" type="number" id="SAL" name="SAL" placeholder="Salary" required>
                <br>
                <label class="form" for="COMM">Comission:</label>
                <input class="form" type="number" id="COMM" name="COMM" placeholder="Commission">
                <br>
                <label class="form" for="DEPTNO">Department Number:</label>
                <input class="form" type="number" id="DEPTNO" name="DEPTNO" placeholder="Department Number" required>
                <br>
                <input type="submit" name="submit" value="Create new Record">   
            </form>
        </div>
<!-- Insert PHP code to handle db insertion -->
        <?php
        require './db_connection.php';        
// Check form is submitted
        if(isset($_POST['submit']))
        {    
// Get form inputs
            $EMPNO=$_POST['EMPNO'];
            $ENAME=$_POST['ENAME'];
            $JOB=$_POST['JOB'];
            $MANAGER=$_POST['MANAGER']; 
            $HIREDATE=$_POST['HIREDATE'];
            $SAL=$_POST['SAL'];
            $COMM=$_POST['COMM'];
            $DEPTNO=$_POST['DEPTNO'];
            
// Preparing the query
            $sql = "INSERT INTO assignment.emp(EMPNO,ENAME,JOB,MGR,HIREDATE,SAL,COMM,DEPTNO)
            VALUES ('$EMPNO','$ENAME','$JOB','$MANAGER','$HIREDATE','$SAL','$COMM','$DEPTNO')";

            // checking insert query worked
            if (mysqli_query($conn, $sql)) {
                echo "Your new record has been created successfully!";
            } else {
                $error="Error: " . $sql . ":-" . mysqli_error($conn);
                echo "$error";
            }
// Close db connection
            mysqli_close($conn);
// Call alert and redirect
            echo '<script type="text/javascript">addRecord();</script>';
        }
        ?>
        </body>
    </main>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->