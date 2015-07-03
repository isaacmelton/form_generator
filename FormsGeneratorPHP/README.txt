Once you have MySQL up and running, go ahead and run the following SQL code:


	CREATE DATABASE formsgenerator;

	CREATE USER 'student'@'localhost' IDENTIFIED BY 'password';

	GRANT ALL PRIVILEGES ON * . * TO 'student'@'localhost';

	FLUSH PRIVILEGES;



We can use the student@localhost account for the php, I figure.  After you 
run this, go ahead and run (either copy/paste the code in the file into 
something like MySQL workbench or run it from the command-line) to create 
and seed the tables.  This will get the database back to how things were 
in the beginning...

Hope this helps.


mysql> show tables;
+--------------------------+
| Tables_in_formsgenerator |
+--------------------------+
| answers                  |
| people                   |
| questions                |
| recorded_answers         |
| surveys                  |
+--------------------------+


mysql> describe answers;
+-------------+--------------+------+-----+---------+----------------+
| Field       | Type         | Null | Key | Default | Extra          |
+-------------+--------------+------+-----+---------+----------------+
| id          | int(11)      | NO   | PRI | NULL    | auto_increment |
| answer      | varchar(150) | YES  |     | NULL    |                |
| created_at  | datetime     | NO   |     | NULL    |                |
| updated_at  | datetime     | NO   |     | NULL    |                |
| question_id | int(11)      | YES  | MUL | NULL    |                |
+-------------+--------------+------+-----+---------+----------------+

mysql> describe people;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |
| first_name | varchar(50)  | YES  |     | NULL    |                |
| last_name  | varchar(50)  | YES  |     | NULL    |                |
| email      | varchar(100) | YES  |     | NULL    |                |
| city       | varchar(100) | YES  |     | NULL    |                |
| state      | varchar(100) | YES  |     | NULL    |                |
| country    | varchar(100) | YES  |     | NULL    |                |
| sex        | varchar(10)  | YES  |     | NULL    |                |
| created_at | datetime     | NO   |     | NULL    |                |
| updated_at | datetime     | NO   |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+

mysql> describe questions;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |
| question   | varchar(255) | YES  |     | NULL    |                |
| created_at | datetime     | NO   |     | NULL    |                |
| updated_at | datetime     | NO   |     | NULL    |                |
| survey_id  | int(11)      | YES  | MUL | NULL    |                |
+------------+--------------+------+-----+---------+----------------+

mysql> describe recorded_answers;
+------------+----------+------+-----+---------+----------------+
| Field      | Type     | Null | Key | Default | Extra          |
+------------+----------+------+-----+---------+----------------+
| id         | int(11)  | NO   | PRI | NULL    | auto_increment |
| user_id    | int(11)  | YES  | MUL | NULL    |                |
| answer_id  | int(11)  | YES  | MUL | NULL    |                |
| survey_id  | int(11)  | YES  |     | NULL    |                |
| created_at | datetime | NO   |     | NULL    |                |
| updated_at | datetime | NO   |     | NULL    |                |
+------------+----------+------+-----+---------+----------------+

mysql> describe surveys;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(11)      | NO   | PRI | NULL    | auto_increment |
| created_at | datetime     | NO   |     | NULL    |                |
| updated_at | datetime     | NO   |     | NULL    |                |
| person_id  | int(11)      | YES  | MUL | NULL    |                |
| title      | varchar(100) | YES  |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+