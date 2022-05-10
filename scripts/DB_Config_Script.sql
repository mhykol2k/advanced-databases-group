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

/* Creating users */
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'password123';
CREATE USER 'default_user'@'localhost' IDENTIFIED BY 'password';

/* Granting permissions */
GRANT ALL on assignment.EMP TO 'admin'@'localhost';
GRANT ALL on assignment.DEPT TO 'admin'@'localhost';

GRANT SELECT ON assignment.EMP TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.EMP TO 'default_user'@'localhost';
GRANT INSERT ON assignment.EMP TO 'default_user'@'localhost';

GRANT SELECT ON assignment.DEPT TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.DEPT TO 'default_user'@'localhost';
GRANT INSERT ON assignment.DEPT TO 'default_user'@'localhost';