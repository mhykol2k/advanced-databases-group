
GRANT ALL on assignment.EMP TO 'admin'@'localhost';
GRANT ALL on assignment.DEPT TO 'admin'@'localhost';

GRANT SELECT ON assignment.EMP TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.EMP TO 'default_user'@'localhost';
GRANT INSERT ON assignment.EMP TO 'default_user'@'localhost';
GRANT DELETE ON assignment.EMP TO 'default_user'@'localhost';
GRANT SHOW DATABASES ON assignment.EMP TO 'default_user';


GRANT SELECT ON assignment.DEPT TO 'default_user'@'localhost';
GRANT UPDATE ON assignment.DEPT TO 'default_user'@'localhost';
GRANT INSERT ON assignment.DEPT TO 'default_user'@'localhost';
GRANT DELETE ON assignment.DEPT TO 'default_user'@'localhost';
GRANT SHOW DATABASES ON assignment.DEPT TO 'default_user'@'localhost';