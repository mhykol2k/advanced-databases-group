/* Query 2 - All employees working in Sales department with sales > 1000 */
SELECT EMP.EMPNO, EMP.ENAME, EMP.SAL, DEPT.DNAME
FROM assignment.EMP, assignment.DEPT
INNER JOIN EMP on EMP.DEPTNO=DEPT.DEPTNO
WHERE EMP.SAL > 1000