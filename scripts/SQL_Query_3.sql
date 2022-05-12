/* Query 3 - All employees working in certain city/LOC */
SELECT EMP.EMPNO, EMP.ENAME, DEPT.LOC
FROM assignment.DEPT
INNER JOIN assignment.EMP on EMP.DEPTNO=DEPT.DEPTNO
WHERE DEPT.LOC="CHICAGO"