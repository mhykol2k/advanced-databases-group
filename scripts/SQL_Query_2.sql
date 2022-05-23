/* Query 2 - Number of Clerks in each department */
SELECT D.DNAME,
       (SELECT COUNT(E.EMPNO)
        FROM assignment.EMP E
        INNER JOIN assignment.DEPT D2 on D2.DEPTNO=E.DEPTNO
        WHERE D2.DNAME=D.DNAME AND E.JOB="Clerk") as ClerkCount
FROM assignment.DEPT D
ORDER BY ClerkCount DESC