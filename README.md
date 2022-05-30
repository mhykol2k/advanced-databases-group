<div id=top></div>


<div align="center" >
</div>

[![mm1089 - advanced-databases-group](https://img.shields.io/static/v1?label=advanced-databases-group&message=view-source-code&color=42b883&logo=github)](https://github.com/mhykol2k/advanced-databases-group "View Source Code")
[![License](https://img.shields.io/badge/License-MIT-42b883)](#license)
[![stars - advanced-databases-group](https://img.shields.io/github/stars/mm1089/advanced-databases-group?style=social)](https://github.com/mhykol2k/advanced-databases-group)

[![view - Documentation](https://img.shields.io/badge/view-Documentation-blue?style=for-the-badge)]((https://github.com/mhykol2k/advanced-databases-group/blob/main/README.md) "Go to project documentation")




<h1 align="center"> Advanced Databases and Big Data </h1>
<h3 align="center">Assignment 2: PHP MySQL Implementation</h3>
<h5 align="center">Software Engineering, Computer Science</h5>
<h6 align="center">Canterbury Christ Church University,</h6>

<h5 align="center">Module Leaders: Dr Amina Souag</h5>

<h5 align="center">Due: 16th May 2022</h5>

<br>

<details open>
<summary>Table of Contents</summary>
<br>
  
- [Prerequisites](#prerequisites)
- [Project Architecture](#project-architecture)
- [Presentation](#presentation)
- [Implementation](#implementation)
  - [Front-end](#front-end)
  - [Back-end](#back-end)
- [Workflow](#workflow)
- [Preparation](#preparation)
- [Issues](#issues)
- [Results](#results)
- [Reflection](#reflection)
- [Conclusion](#conclusion)
- [Rubric](#rubric)
- [Appendices](#appendices)
  
</details>
<br>

<details open>
<summary>Assignment Information</summary>
<br>

<a>GitHub Project Link: [Here](https://github.com/mhykol2k/advanced-databases-group)</a>

<a>Presentation Download:</a> [Here](https://youtube.com/)
</details>
<br>



## Prerequisites

<p>To run this implementation you will need to ensure that you have the following prerequisites installed:</p>

1. XAMMP
2. Web-Browser (Chrome, Edge or Firefox)

```bash
# Select the htdocs directory in Xampp Folder.
cd C:\xampp\htdocs\

# Clone the group repository into htdocs.
git clone https://github.com/mm1089/advanced-databases-group.git

# Start Apache and MySQL server on the XAMPP Application.

# You can now access the project locally:
http://localhost/advanced-databases-group/lib/index.php
```

<details open>
<summary>Problems with installation?</summary>
<p>If you cannot install through GitHub or bash CLI, you can  download the repository and drop it into the folder:
</p>

```bash
C:\xampp\htdocs\
```

</details>

You can access the implementation locally:
```sh
http://localhost/advanced-databases-group/lib/index.php
```

## Project Architecture

<p>The project architecture is as detailed below. Using GitHub we can track or untrack certain local development dependencies and make a univeral download for anyone.</p>

<img width="120" alt="image" src="https://user-images.githubusercontent.com/72493335/165288032-6c7212a6-21dd-4d0d-987d-fc36367742a2.png">


## Presentation

<p>
As a requirement for the 'Advanced Databases and Big Data' project we must create a video presentation, in which we will explain the database preparation techniques, including connecting to the database, queries and results. Additionally, we must document our findings in a brief background report that will
be available on GitHub and as a PDF.
</p>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Implementation

### Front-end

#### PHP DB Connection

This is how we have connected to the database, we created a single file to handle all of the connections. So we can just refer to it within the code.
```php
// db_connection.php
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
?>
```

This section details how we connect the PHP frontend to the mySQL database. IF this project was to be deployed online (spoke about briefly in project demo) you would need to configure these variables to match the deployed solutions.
- $servername - being the ip address of the deployed database
- $username - being the username of the user account needed online
- $password - password to the user account
- $dbname - the database schema name

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

#### PHP DB Form Insert

```php
// Insert PHP code to handle db insertion 
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
?>
```
This code essentially just checks if the php form has been submitted, if it has it populates the variables associated with each field on the database's EMP table and posts it the the database. All form validation is handled by the php page previously on submit meaning no false/invalid data can be added.

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

This is how we take the user inputs from the form, and use them to populate the new record of the database. The user entered data is stored and manipulated so that it can be displayed on the PHP frontend when called.

```php
<?php
// // Preparing the query
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
?>
```

This works by just checking if the query has been successfully inserted to the database, if not it returns the error message on the webpage. If it works it returns a new record has been inserted successfully on a pagfe alert. The database connection is then closed and the page returns to the homepage.

#### PHP DB Table

How we have functionality for inserting the data into the database, and how we are preparing to run queries. This section also contains information on the table style, including width and borders.

```php
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
```

This codeblock details how we displayed the data from the database on the PHP index. IT essentially just reads the data retrieved from the result of the SQL query and creates a table from it. Additionally, this serves as a validatiion check and ensures data is correctly entered, otherwise it will return 0/null results.

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

### Back-end

#### DB Config

<p>To implement the back end we wrote a script to create and populate the existing database given to us; and create new users to manage/query it. This was done inside one big script (DB_Config_Script.sql) so that when users go to deploy the database all they have to do import the SQL script and run it. The code to create and populate the tables can be found in the appendix at the bottom of the report.
</p>

#### DB Permissions

<p>Next we had to take into consideration the permissions needed by the users of the system and how many different users there would be. According to the brief, users simply need to be able to insert new employees/departments and edit existing ones. Therefore we created only two users: admin and default_user (see Figure 3.0). Due to there being no mention of deleting tables these permissions were not included for the general user(see Figure 4.0).
</p>

#### DB SQL Scripts

<p>Finally, users would need to be able to run and view the results of any 3 SQL queries. The brief does not mention any particular queries therefore we just went ahead and created the queries seen in the below appendix(see all of Figure 5). Similar to the DB_Config_Script these, onec the DB has been created, can simply be imported and run through the PHPmyAdmin page.
</p>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

<details open>
<summary>Query 1</summary>
<br>

<p>The first SQL query we wrote for the users to have ready to run is a query to count all employees under a certain manager (displayed below).</p>

```sql
/* Query 1 - Returns the number of employees each manager is responsible for */
SELECT E.EMPNO,
       E.ENAME,
       (SELECT COUNT(E2.EMPNO)
        FROM assignment.EMP E2
        WHERE E2.MGR=E.EMPNO) as EMPCOUNT
FROM assignment.EMP E
WHERE E.MGR="7839"
ORDER BY EMPCOUNT DESC
```
This query works by first using 'SELECT' to select the EMPNO and ENAME fields from the EMP table so the employees number and name is displayed in the search results. Next, we used a nested select statement within the select statement to run a query to count all the employees that work under the president and returned it as EMPCOUNT, aka the managers. Then, the 'FROM' SQL command to specify the database and tables we want to query from; this being the EMP table in both queries. Finally, we use the 'WHERE' SQL command to specify the MGR fields value which is used to specify the employees managers employee number this being the main presidents EMPNO as this will return us all managers along with their count of employees. Finally, we added an ORDER BY statement to filter the list by descending with the manager with the most responsibility at the top.

Ideally this query will be implemented alongside some kind of drop down menu that specifies all the managers names along with employee number, however in our solution due to the size of the database we decided against this. This query can be used by the business to quickly see what managers are under-staffed and which are taking on responsibility for too much staff; either when employing new staff or generally, a useful business use case.

</details>
<br>

<details open>
<summary>Query 2</summary>
<br>

<p>The second SQL query we wrote for the users to have ready to run displays all clerks in each  department.</p>

```sql
/* Query 2 - Number of Clerks in each department */
SELECT D.DNAME,
       (SELECT COUNT(E.EMPNO)
        FROM assignment.EMP E
        INNER JOIN assignment.DEPT D2 on D2.DEPTNO=E.DEPTNO
        WHERE D2.DNAME=D.DNAME AND E.JOB="Clerk") as ClerkCount
FROM assignment.DEPT D
ORDER BY ClerkCount DESC
```

This query works by first using the SQL 'SELECT' statement to select: department name and then a nested select statement which is responsible for returning the clerk count. To do this we used the COUNT function to count the amount of unique EMPNO's returned from the nested SQL query. Next, we needed to join the department and employee tables to be able to query what we needed; the department name and the employee job. To do this we needed to create another instance of the department table and join it to the emp table we created to search for employees with the job of 'CLERK'. Next, we needed to specify the paramaters of the search to count the results from; to do this we specified the name of the department in the nested query is the same as the one in the parent query and then specified the job to be 'CLERK'. This nested query will now essentially loop through each department, and count all the employees with the job of clerk in its job description. Again finally, we used ORDER BY to return these results as descending.

The reason we chose to do this query is as the 'CLERK' was the only cross departmental job role which we could query and collect the count for each department. This is a useful query to the business as it will quickly display which offices/locations have too much/little clerks quick and easily.

</details>
<br>

<details open>
<summary>Query 3</summary>
<br>

<p>Finally, the third SQL query we wrote for the users to have ready to run displays the count of employees working in a certain city/location</p>

```sql
/* Query 3 - Number of employees working in each city/LOC */
SELECT D.LOC,
       (SELECT Count(E.EMPNO)
        FROM assignment.EMP E
        INNER JOIN assignment.DEPT D2 on D2.DEPTNO=E.DEPTNO
        WHERE D2.LOC=D.LOC) as EmployeeCount
FROM assignment.DEPT D
ORDER BY EmployeeCount DESC
```

Firstly, we needed to use the SELECT statement to select the fields we wanted to return in the results these being; department location, and then the nested select statement to return the count of employees. This is returned as EmployeeCount. Then we used the FROM statement to specify we wanted the department names from the department table in the parent query. The nested select statement works similar to previous in the way it takes the department name from the parent query to run and count the employees for by joining the tables. Again here, using ORDER BY DESC to order the count of employees in each department by descending.

Similar to before, ideally this would be implemented alongside a drop down menu to select the location the user would like the results from. However, for the scale of this project/business we decided to simply run this as an all in one query. If there becomes multiple offices/locations it may be better to implement it this way for user ease.

</details>
<br>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Workflows

|Artifact|Person(s) Responsible|Artifact Status|Notes|Date Completed|
|---|---|---|---|---|
|~~_**GitHub Documentation**_~~|Michael McLain|&check; (complete)|_Extra Information_|_**25/04/22**_|
|~~_**Design Report**_~~|Michael McLain, William Castleman, Jure Sunic|&check; (complete)|_Extra Information_|_**29/04/22**_|
|~~_**HTML**_~~| Michael McLain, William Castleman, Jure Sunic|&check; (complete)|_Extra Information_|_**07/05/22**_|
|~~_**CSS**_~~|Michael McLain, Jure Sunic|&check; (complete)|_Extra Information_|_**18/05/22**_|
|_~~**PHP**~~_|Michael McLain, William Castleman, Jure Sunic|&check; (complete)|_Extra Information_|_**15/05/22**_|
|~~_**MySQL Scripting**_~~|William Castleman, Jure Sunic|&check; (complete)|_Extra Information_|_**23/05/22**_|

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Preparation
<p>For the creation of the front-end we are using PHP to send HTML (and CSS and JavaScript) to the browser, it really works well in computation on the server (and accessing a database, not on the user's computer). Not using PHP to focus on the client-side is just as bad as using it to generate only client-side code.

</p>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Issues

GitHub features Issues, which can be defined as a lightweight issue-tracking system available for all GitHub repositories. The ideology is that users will
consistently use it as your project evolves. In most cases, GitHub Issues is used for reporting bugs and requesting features.

The project issues are tracked: [Here](https://github.com/mhykol2k/advanced-databases-group/issues)
<img width="1107" alt="image" src="https://user-images.githubusercontent.com/72493335/165314933-0d09fc61-b3d2-415d-8ac4-e393ffbc3cad.png">

<br>

## Reflection and Results
<br>

<p>There are limitations with the relational model when handling big data. However, the NoSQL models and technologies have succeeded in overcoming those limitations. NoSQL is considered when data is mostly unstructured or is semi-structured data that doesnt't fit the traditional relational model. Also, designers must consider SQL when their data is highly structured and doesn't frequently change.

Relational databases are a kind of management system in which tables are used to store all forms of data. It is the standard way for software developers to store complex data and once the data is stored inside the table it can be retrieved at any time. The cost involved in a traditional releational database can be significant. Because often multiple types of software need to be purchased, and a professional technician is usually required to maintain the system lifecycle.

Addtionally, relational databases have poor performance, although its speed is still considerably high in comparison to other methods due to the ease and simplicity.

Finally, compared to other data models, relational models are simple and avoid complex structuring. Due to this, relational databases do not require complex queries for execution.
</p>

<br>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Conclusion

In summation, we were able to use PHP to create a new record, and view the current records. Addtionally, we managed to run 3 complex queries (Detailed in Appendix).


|Consider SQL if...|Consider NoSQL if...|
|---|---|
|Data is highly structured and doesn't change frequently|Data is mostly unstructured that doesn't fit the relational model|Something useful|
|The project is transaction-orientated. E.g., Financial Applications|Flexability of dynamic schemas is required or want more choice over the data model|
|A high degree of security or integrity is required|The database needs to scale|
|Routinely execute complex queries|Horizontal scaling, across multiple georaphic locations|
|Scale-out capabilities are not required|The application does not require the level of integrity offered by SQL databases.|

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>



## Rubric

![image](https://user-images.githubusercontent.com/72493335/165140305-b4b4d3bb-fadd-4e0d-b3a8-fd7ac8b84182.png)

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Appendices 

<h4>This section of the report is for code snippets, images or any other relevant information that is not apparent at first glance</h4>

<h3 align="center">Figure 1.0</h3>
<p align="center">Taken from DB_Config_Script.sql. This section of code from the script creates the database and respective tables.</p>

```sql
/* Creating tables */
CREATE SCHEMA assignment;

CREATE TABLE 
assignment.EMP(
    EMPNO int NOT NULL,
    ENAME varchar(255) NOT NULL,
    JOB varchar(255) NOT NULL,
    MGR int,
    HIREDATE date NOT NULL,
    SAL decimal(6,2) NOT NULL,
    COMM decimal(6,2),
    DEPTNO int NOT NULL references assignment.EMP(DEPTNO),
    PRIMARY KEY (EMPNO)
);

CREATE TABLE 
assignment.DEPT(
    DEPTNO int NOT NULL,
    DNAME varchar(255) NOT NULL,
    LOC varchar(255) NOT NULL,
    PRIMARY KEY (DEPTNO)
);
```
<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

<h3 align="center">Figure 2.0</h3>
<p align="center">Taken from DB_Config_Script.sql. This section of code from the script populates the database tables with the data provided in the brief.</p>

```sql
/* Populating tables */
INSERT INTO assignment.EMP (EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO)
VALUES
('7369', 'SMITH', 'CLERK', '7902', '1980-12-17', '800.00', NULL, '20'),
('7499', 'ALLEN', 'SALESMAN', '7698', '1981-02-20', '1600.00', '300.00', '30'),
('7521', 'WARD', 'SALESMAN', '7698', '1981-02-22', '1250.00', '500.00', '30'),
('7566', 'JONES', 'MANAGER', '7839', '1981-04-02', '2975.00', NULL, '20'),
('7654', 'MARTIN', 'SALESMAN', '7698', '1981-09-29', '1250.00', '1400.00', '30'),
('7698', 'BLAKE', 'MANAGER', '7839', '1981-05-01', '2850.00', NULL, '30'),
('7782', 'CLARK', 'MANAGER', '7839', '1981-06-09', '2450.00', NULL, '10'),
('7839', 'KING', 'PRESIDENT', NULL, '1981-11-17', '5000.00', NULL, '10'),
('7844', 'TURNER', 'SALESMAN', '7698', '1981-09-08', '1500.00', '0.00', '30'),
('7876', 'ADAMS', 'CLERK', '7788', '1981-09-23', '1100.00', NULL, '20'),
('7900', 'JAMES', 'CLERK', '7698', '1981-12-03', '950.00', NULL, '30'),
('7902', 'FORD', 'ANALYST', '7566', '1981-12-03', '3000.00', NULL, '20'),
('7934', 'MILLER', 'CLERK', '7782', '1982-01-23', '1300.00', NULL, '10');

INSERT INTO assignment.DEPT (DEPTNO, DNAME, LOC)
VALUES
('10', 'ACCOUNTING', 'NEW-YORK'),
('20', 'RESEARCH', 'DALLAS'),
('30', 'SALES', 'CHICAGO'),
('40', 'OPERATIONS', 'BOSTON');
```
<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

<h3 align="center">Figure 3.0</h3>
<p align="center">Taken from DB_Config_Script.sql. This section of code from the script creates the different user(s) for the system.</p>

```sql
/* Creating users */
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password123';
CREATE USER 'default_user'@'localhost' IDENTIFIED BY 'password';
```
<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

<h3 align="center">Figure 4.0</h3>
<p align="center">Taken from DB_Config_Script.sql. This section of code from the script grants the new users the necessarry permissions required.</p>

```sql
/* Granting permissions */
GRANT ALL on assignment.EMP TO 'admin'@'localhost';
GRANT ALL on assignment.DEPT TO 'admin'@'localhost';

GRANT SELECT ON assignment.EMP TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.EMP TO 'default_user'@'localhost';
GRANT INSERT ON assignment.EMP TO 'default_user'@'localhost';

GRANT SELECT ON assignment.DEPT TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.DEPT TO 'default_user'@'localhost';
GRANT INSERT ON assignment.DEPT TO 'default_user'@'localhost';
```
<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>