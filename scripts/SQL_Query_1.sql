/* Query 1 - All employees under certain manager EMPNO */
SELECT EMP.ENAME
FROM assignment.EMP
WHERE EMP.NAME NOT IN (SELECT MGR = '7839' FROM assignment.EMP)
