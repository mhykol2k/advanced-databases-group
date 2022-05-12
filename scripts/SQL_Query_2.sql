/* Query 2 - All employees working in Sales department with sales > 1000 */
SELECT EMP.EMPNO, EMP.ENAME, EMP.SAL, DEPT.DNAME
FROM assignment.DEPT INNER JOIN assignment.EMP ON EMP.DEPTNO = DEPT.DEPTNO
WHERE EMP.SAL > 1000 AND DEPT.DNAME = "SALES" LIMIT 0, 25