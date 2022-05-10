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
        require './db_connection.php';        
        // check form is submitted
        if(isset($_POST['submit']))
        {    
            // get form inputs
            $EMPNO = echo $_POST['EMPNO'];
            $ENAME = echo $_POST['ENAME'];
            $JOB = echo $_POST['JOB'];
            $MANAGER = echo $_POST['MANAGER']; 
            $HIREDATE = echo date('Y-m-d', strotime($_POST['HIREDATE']));
            $SAL = echo $_POST['SAL'];
            $COMM = echo $_POST['COMM'];
            $DEPTNO = echo $_POST['DEPTNO'];

            // validating inputs
            if($EMPNO=="" || $ENAME=="" || $JOB=="" || $MANAGER=="" || $HIREDATE=="" || $SAL==""
            || $COMM=="" || $COMM=="" || $DEPTNO==""){
                // throwing error if fields empty
                alert("Missing field inputs");
            }else{
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
            <form class="form" action="index.php" method="POST">
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
</html>

<!-- Resources Used -->
<!-- http://php.net/manual/en/faq.installation.php#faq.installation.addtopath -->
<!-- For Issue #1 'bash: php: command not found' -->