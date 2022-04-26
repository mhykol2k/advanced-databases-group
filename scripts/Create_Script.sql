CREATE SCHEMA assignment;

CREATE TABLE 
assignment.EMP(
    EMPNO int NOT NULL,
    ENAME varchar(255) NOT NULL,
    JOB varchar(255) NOT NULL,
    MGR int,
    HIREDATE date NOT NULL,
    SAL decimal(5,2) NOT NULL,
    COMM decimal(5,2),
    DEPTNO int NOT NULL references assignment.EMP(DEPTNO),
    CONSTRAINT EMP_PK PRIMARY KEY (EMPNO)
);

CREATE TABLE 
assignment.DEPT(
    DEPTNO int NOT NULL,
    DNAME varchar(255) NOT NULL,
    LOC varchar(255) NOT NULL,
    CONSTRAINT DEPT_PK PRIMARY KEY (DEPTNO)
);