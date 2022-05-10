<!DOCTYPE html>
<html>
    <head>
        <title>Add New Record</title>
        <link rel="stylesheet" href="../assets/main.css">
        <link rel="icon" href="../media/globe-icon.png">
    </head>

<script>
    function addRecord() {
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
            <form class="form" method="POST">
                <br>
                <!-- <label class="form" for="EMPNO">EMPNO:</label> -->
                <input class="form" type="number" id="EMPNO" name="EMPNO" placeholder="Employee Number" required>
                <br>
                <!-- <label class="form" for="ENAME">ENAME:</label> -->
                <input class="form" type="text" id="ENAME" name="ENAME" placeholder="Employee Name" required>
                <br>
                <!-- <label class="form" for="JOB">JOB:</label> -->
                <input class="form" type="text" id="JOB" name="JOB" placeholder="Job" required>
                <br>
                <!-- <label class="form" for="MANAGER">MANAGER:</label> -->
                <input class="form" type="text" id="MANAGER" name="MANAGER" placeholder="Manager">
                <br>
                <!-- <label class="form" for="HIREDATE">HIREDATE:</label> -->
                <input class="form" type="date" id="HIREDATE" name="HIREDATE" placeholder="dd/MM/yyyy" min="1940-01-01" min="2100-01-01" required>
                <br>
                <!-- <label class="form" for="SAL">SALARY:</label> -->
                <input class="form" type="number" id="SAL" name="SAL" placeholder="Salary" required>
                <br>
                <!-- <label class="form" for="COMM">COMMISION:</label> -->
                <input class="form" type="number" id="COMM" name="COMM" placeholder="Commision">
                <br>
                <!-- <label class="form" for="DEPTNO">DEPTNO:</label> -->
                <input class="form" type="number" id="DEPTNO" name="DEPTNO" placeholder="Department Number" required>
                <br>
                <input type="submit" name="submit" value="Submit">
                <br>
            </form>
        </div>

        <!-- Insert PHP code to handle db insertion -->
        <?php
        require './db_connection.php';        
        // check form is submitted
        if(isset($_POST['submit']))
        {    
            // get form inputs
            $EMPNO=$_POST['EMPNO'];
            $ENAME=$_POST['ENAME'];
            $JOB=$_POST['JOB'];
            $MANAGER=$_POST['MANAGER']; 
            $HIREDATE=$_POST['HIREDATE'];
            $SAL=$_POST['SAL'];
            $COMM=$_POST['COMM'];
            $DEPTNO=$_POST['DEPTNO'];

            // validating inputs
            if($EMPNO=="" || $ENAME=="" || $JOB=="" || $MANAGER=="" || $HIREDATE=="" || $SAL==""
            || $COMM=="" || $COMM=="" || $DEPTNO==""){
                // throwing error if fields empty
                echo "Missing field inputs";
            }else{
                // preparing the query
                $sql = "INSERT INTO assignment.emp(EMPNO,ENAME,JOB,MGR,HIREDATE,SAL,COMM,DEPTNO)
                VALUES ('$EMPNO','$ENAME','$JOB','$MANAGER','$HIREDATE','$SAL','$COMM','$DEPTNO')";
                // checking insert query worked
                if (mysqli_query($conn, $sql)) {
                    echo "New record has been added successfully!";
                } else {
                    $error="Error: " . $sql . ":-" . mysqli_error($conn);
                    echo "$error";
                }
                mysqli_close($conn);
            }
        }
        ?>

<!-- End of Body -->
        </body>
    </main>
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->