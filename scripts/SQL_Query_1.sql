/* Query 1 - Returns the number of employees each manager is responsible for */
SELECT E.EMPNO,
       E.ENAME,
       (SELECT COUNT(E2.EMPNO)
        FROM assignment.EMP E2
        WHERE E2.MGR=E.EMPNO) as EMPCOUNT
FROM assignment.EMP E
WHERE E.MGR="7839"
