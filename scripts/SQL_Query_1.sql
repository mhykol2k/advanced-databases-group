/* Query 1 - All employees under certain manager EMPNO */
SELECT EMP.EMPNO, EMP.ENAME
FROM assignment.EMP
WHERE MGR = '7839'