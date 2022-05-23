/* Query 3 - Number of employees working in each city/LOC */
SELECT D.LOC,
       (SELECT Count(E.EMPNO)
        FROM assignment.EMP E
        INNER JOIN assignment.DEPT D2 on D2.DEPTNO=E.DEPTNO
        WHERE D2.LOC=D.LOC) as EmployeeCount
FROM assignment.DEPT D
ORDER BY EmployeeCount DESC