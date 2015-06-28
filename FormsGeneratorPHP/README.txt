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
