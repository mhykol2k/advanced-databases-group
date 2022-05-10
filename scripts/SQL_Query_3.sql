/* Query 3 - All employees working in certain city/LOC */
SELECT EMP.EMPNO, EMP.ENAME, DEPT.LOC
FROM assignment.EMP, assignment.DEPT
INNER JOIN EMP on EMP.DEPTNO=DEPT.DEPTNO
WHERE DEPT.LOC="CHICAGO"