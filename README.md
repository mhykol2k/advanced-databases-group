<div id=top></div>


<div align="center" >
</div>

[![mm1089 - advanced-databases-group](https://img.shields.io/static/v1?label=advanced-databases-group&message=view-source-code&color=42b883&logo=github)](https://github.com/mm1089/advanced-databases-group "View Source Code")
[![License](https://img.shields.io/badge/License-MIT-42b883)](#license)
[![stars - advanced-databases-group](https://img.shields.io/github/stars/mm1089/advanced-databases-group?style=social)](https://github.com/mm1089/advanced-databases-group)

[![view - Documentation](https://img.shields.io/badge/view-Documentation-blue?style=for-the-badge)]((https://github.com/mm1089/advanced-databases-group/blob/main/README.md) "Go to project documentation")




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

<a>Assignment Brief Download:</a> [Here](https://rb.gy/u1qb6f)

<a>GitHub Project Link: [Here](https://github.com/mm1089/advanced-databases-group)</a>

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

## Project Architecture

<p>The project architecture is as detailed below. Using GitHub we can track or untrack certain local development dependencies and make a univeral download for anyone.</p>

<img width="120" alt="image" src="https://user-images.githubusercontent.com/72493335/165288032-6c7212a6-21dd-4d0d-987d-fc36367742a2.png">

You can access the implementation locally:
```sh
http://localhost/advanced-databases-group/lib/index.php
```

## Presentation

<p>
As a requirement for the 'Advanced Databases and Big Data' project we must create a video presentation, in which we will explain the database preparation techniques, including connecting to the database, queries and results. Additionally, we must document our findings in a brief background report that will
be available on GitHub and as a PDF.
</p>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Implementation

### Front-end



show how to in php:
**edit db & display results**

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

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

To add a new record we must...

```php
<?php
// Add New Record
?>
```

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

To display the mysql results we must...

```php
<?php
// Display Results
?>
```

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

### Back-end

<p>To implement the back end we wrote a script to create and populate the existing database given to us; and create new users to manage/query it. This was done inside one big script (DB_Config_Script.sql) so that when users go to deploy the database all they have to do is copy paste the SQL queries and run them. The code to create and populate the tables can be found in the appendix at the bottom of the report.
</p>

<p>Next we had to take into consideration the permissions needed by the users of the system and how many different users there would be. According to the brief, users simply need to be able to insert new employees/departments and edit existing ones. Therefore we created only two users: admin and default_user (see Figure 3.0). Due to there being no mention of deleting tables these permissions were not included for the general user(see Figure 4.0).
</p>

<p>Finally, users would need to be able to run and view the results of any 3 SQL queries. The brief does not mention any particular queries therefore we just went ahead and created the queries seen in the below appendix(see all of Figure 5).
</p>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

<p>The first SQL query we wrote for the users to have ready to run is a query to display all employees under a certain manager employee number (displayed below).</p>

<details open>
<summary>Query 1</summary>
<br>

```sql
/* Query 1 - All employees under certain manager EMPNO */
SELECT EMP.EMPNO, EMP.ENAME
FROM assignment.EMP
WHERE MGR = '7839'
```
This query works by first using 'SELECT' to select the EMPNO and ENAME fields from theh EMP table so the employees number and name is displayed in the search results. Next, we use the 'FROM' SQL command to specify the database and tables we want to query from; this being the EMP table. Finally, we use the 'WHERE' SQL command to specify the MGR fields value which is used to specify the employees managers employee number.

Ideally this query will be implemented alongside some kind of drop down menu that specifies all the managers names along with employee number. This could then be used by the business to quickly see what managers are under-staffed and which are taking on responsibility for too much staff; either when employing new staff or generally.

</details>
<br>

<p>The second SQL query we wrote for the users to have ready to run displays all employees in the sales department sales figures.</p>

<details open>
<summary>Query 2</summary>
<br>

```sql
/* Query 2 - All employees working in Sales department with sales > 1000 */
SELECT EMP.EMPNO, EMP.ENAME, EMP.SAL, DEPT.DNAME
FROM assignment.EMP, assignment.DEPT
INNER JOIN EMP on EMP.DEPTNO=DEPT.DEPTNO
WHERE EMP.SAL > 1000
AND DEPT.DNAME="SALES"
```

This query works by first using the SQL 'SELECT' statement to select: employee number, employee name, employee sales figures, and department name fields to be displayed in the results. Next, we specify we want to query data from both tables as seen above on line 2 of the query. Now, due to the fact we need to find employees from only the SALES department we need to join the tables records to be able to query using the department name of 'SALES'. To do that we have used an SQL 'INNER JOIN' statement to connect the DEPTNO from the EMP table to the DEPTNO from the DEPT table. This could of also been done by manually finding the SALES departments DEPTNO and including it as a parameter in the WHERE statement although this would take a lot longer if there were hundreds/thousands of departments. Next, we needed to find only employees with SALES of more than 1000. To do this we simply specified it in the WHERE section of the query using the SAL field and the more than operator ('>'). Finally, we need to specify the department name so that only employees from the SALES department show up in the results.

</details>
<br>

<p>Finally, the third SQL query we wrote for the users to have ready to run displays all employees working in a certain city/location</p>

<details open>
<summary>Query 3</summary>
<br>

```sql
/* Query 3 - All employees working in certain city/LOC */
SELECT EMP.EMPNO, EMP.ENAME, DEPT.LOC
FROM assignment.EMP, assignment.DEPT
INNER JOIN EMP on EMP.DEPTNO=DEPT.DEPTNO
WHERE DEPT.LOC="CHICAGO"
```

Firstly, we used the SQL 'SELECT' statement to select the employee number, name, and location to be displayed in the results. Next, we used 'FROM' statement to select the database and tables required; these being the employee and department table. Now, we used an 'INNER JOIN' to join the records where the DEPTNO is equal in both tables to allow us to query by the location (DEPT.LOC). Finally, as mentioned previously we need to specify the location we want the employees from this is where the sql statement 'WHERE' is used.

Similar to before, ideally this would be implemented alongside a drop down menu to select the location the user would like the results from.
</details>
<br>

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Workflow

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

The project issues are tracked: [Here](https://github.com/mm1089/advanced-databases-group/issues)
<img width="1107" alt="image" src="https://user-images.githubusercontent.com/72493335/165314933-0d09fc61-b3d2-415d-8ac4-e393ffbc3cad.png">
  
## Results

After completeing this assignment we were able to find... similarities, differences...
  
<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Reflection

<p>There are limitations with the relational model when handling big data. However, the NoSQL models and technologies have succeeded in overcoming those limitations


Designers must consider SQL when your data is highly structured and doesn't change frequently.

For NoSQL, it is considered when data is mostly unstructured or semi-structured data that doesnt't fit the relational model
</p>

|Consider SQL if...|Consider NoSQL if...|
|---|---|
|Data is highly structured and doesn't change frequently|Data is mostly unstructured that doesn't fit the relational model|Something useful|
|The project is transaction-orientated. E.g., Financial Applications|Flexability of dynamic schemas is required or want more choice over the data model|
|A high degree of security or integrity is required|The database needs to scale|
|Routinely execute complex queries|Horizontal scaling, across multiple georaphic locations|
|Scale-out capabilities are not required|The application does not require the level of integrity offered by SQL databases.|

<!-- back to top -->
<p align="right">(<a href="#top">back to top</a>)</p>

## Conclusion

In summation, we were able to use PHP to create a new record, and view the current records. Addtionally, we managed to run 3 complex queries (Detailed in Appendix).
  
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