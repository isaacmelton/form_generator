Site available online at: http://45.55.93.140/

use the following credentials for 'logged in" features
login: jjones@example.com
passw: password



-------------------------------------------------------------------------------

Once you have MySQL up and running, go ahead and run the following SQL code:


	CREATE DATABASE formsgenerator;

	CREATE USER 'siteuser'@'localhost' IDENTIFIED BY 'cs6920final';

	GRANT ALL PRIVILEGES ON * . * TO 'siteuser'@'localhost';

	FLUSH PRIVILEGES;



After you run this, go ahead and run (either copy/paste the code in the file into 
something like MySQL workbench or run it from the command-line) to create 
and seed the tables.  This will get the database back to how things were 
in the beginning...

Hope this helps.


mysql> show tables;
+--------------------------+
| Tables_in_formsgenerator |
+--------------------------+
| answers                  |
| users                    |
| people                   |
| questions                |
| recorded_answers         |
| surveys                  |
+--------------------------+

TABLE: people
+------------+--------------+------+-----+---------------------+-----------------------------+
| Field      | Type         | Null | Key | Default             | Extra                       |
+------------+--------------+------+-----+---------------------+-----------------------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment              |
| first_name | varchar(50)  | YES  |     | NULL                |                             |
| last_name  | varchar(50)  | YES  |     | NULL                |                             |
| email      | varchar(100) | YES  |     | NULL                |                             |
| city       | varchar(100) | YES  |     | NULL                |                             |
| state      | varchar(100) | YES  |     | NULL                |                             |
| country    | varchar(100) | YES  |     | NULL                |                             |
| sex        | varchar(10)  | YES  |     | NULL                |                             |
| created_at | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
+------------+--------------+------+-----+---------------------+-----------------------------+

TABLE: users
+------------+--------------+------+-----+---------------------+-----------------------------+
| Field      | Type         | Null | Key | Default             | Extra                       |
+------------+--------------+------+-----+---------------------+-----------------------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment              |
| person_id  | int(11)      | NO   | UNI | NULL                |                             |
| password   | varchar(100) | NO   |     | NULL                |                             |
| created_at | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
+------------+--------------+------+-----+---------------------+-----------------------------+

TABLE: surveys
+------------+--------------+------+-----+---------------------+-----------------------------+
| Field      | Type         | Null | Key | Default             | Extra                       |
+------------+--------------+------+-----+---------------------+-----------------------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment              |
| created_at | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| person_id  | int(11)      | YES  | MUL | NULL                |                             |
| title      | varchar(100) | YES  |     | NULL                |                             |
| active     | tinyint(1)   | NO   |     | NULL                |                             |
+------------+--------------+------+-----+---------------------+-----------------------------+

TABLE: questions
+------------+--------------+------+-----+---------------------+-----------------------------+
| Field      | Type         | Null | Key | Default             | Extra                       |
+------------+--------------+------+-----+---------------------+-----------------------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment              |
| sequence   | int(11)      | NO   |     | NULL                |                             |
| question   | varchar(255) | YES  |     | NULL                |                             |
| created_at | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| survey_id  | int(11)      | YES  | MUL | NULL                |                             |
+------------+--------------+------+-----+---------------------+-----------------------------+

TABLE: answers
+-------------+--------------+------+-----+---------------------+-----------------------------+
| Field       | Type         | Null | Key | Default             | Extra                       |
+-------------+--------------+------+-----+---------------------+-----------------------------+
| id          | int(11)      | NO   | PRI | NULL                | auto_increment              |
| sequence    | int(11)      | NO   |     | NULL                |                             |
| answer      | varchar(150) | YES  |     | NULL                |                             |
| created_at  | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at  | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| question_id | int(11)      | NO   | MUL | NULL                |                             |
+-------------+--------------+------+-----+---------------------+-----------------------------+

TABLE: recorded_answers
+------------+-----------+------+-----+---------------------+-----------------------------+
| Field      | Type      | Null | Key | Default             | Extra                       |
+------------+-----------+------+-----+---------------------+-----------------------------+
| id         | int(11)   | NO   | PRI | NULL                | auto_increment              |
| user_id    | int(11)   | YES  | MUL | NULL                |                             |
| answer_id  | int(11)   | YES  | MUL | NULL                |                             |
| survey_id  | int(11)   | YES  |     | NULL                |                             |
| created_at | timestamp | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at | timestamp | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
+------------+-----------+------+-----+---------------------+-----------------------------+