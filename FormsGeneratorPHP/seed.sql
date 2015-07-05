USE formsgenerator;


DROP TABLE IF EXISTS recorded_answers;
DROP TABLE IF EXISTS answers;
DROP TABLE IF EXISTS questions;
DROP TABLE IF EXISTS surveys;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS people;


CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL UNIQUE, first_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(100), city VARCHAR(100), state VARCHAR(100), country VARCHAR(100), sex VARCHAR(10), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id));
INSERT INTO people VALUES(1,'James','Jones','jjones@example.com','Atlanta','GA','USA','M','2015-06-23 16:13:50.837040','2015-06-23 16:13:50.837040');
INSERT INTO people VALUES(2,'John','Doe','jdoe@example.com','Charlottesville','VA','USA','M','2015-06-23 16:13:50.846281','2015-06-23 16:13:50.846281');
INSERT INTO people VALUES(3,'Andrew','Smith','asmith@example.com','Memphis','TN','USA','M','2015-06-23 16:13:50.855041','2015-06-23 16:13:50.855041');
INSERT INTO people VALUES(4,'Simon','West','swest@example.com','Madison','WI','USA','M','2015-06-23 16:13:50.868537','2015-06-23 16:13:50.868537');
INSERT INTO people VALUES(5,'Richard','Matheson','rmatheson@example.com','Macon','GA','USA','M','2015-06-23 16:13:50.874558','2015-06-23 16:13:50.874558');
INSERT INTO people VALUES(6,'Jennifer','Dyer','jdyer@example.com','Omaha','NE','USA','F','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO people VALUES(7,'Jane','Doe','janedoe@example.com','Sacramento','CA','USA','F','2015-06-23 16:13:50.888970','2015-06-23 16:13:50.888970');
INSERT INTO people VALUES(8,'Erica','Melton','emelton@example.com','Cleveland','OH','USA','F','2015-06-23 16:13:50.894549','2015-06-23 16:13:50.894549');
INSERT INTO people VALUES(9,'Rebecca','Johnson','rjohnson@example.com','Houston','TX','USA','F','2015-06-23 16:13:50.901328','2015-06-23 16:13:50.901328');
INSERT INTO people VALUES(10,'Anna','Jones','ajones@example.com','Atlanta','GA','USA','F','2015-06-23 16:13:50.920218','2015-06-23 16:13:50.920218');


CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL UNIQUE, person_id INT NOT NULL UNIQUE, password VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id), FOREIGN KEY (person_id) REFERENCES people (id));
INSERT INTO users VALUES
(4, 1, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(5, 2, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(6, 3, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(7, 4, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(8, 5, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(9, 6, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(10, 7, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(11, 8, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(12, 9, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182');
INSERT INTO users VALUES
(13, 10, '$2y$10$WX4qDDdGVpYlML1PCHf9De.AFxQxu8oEkQ.9G8AKba2jAFRT/5Xj6','2015-06-23 16:13:50.882182','2015-06-23 16:13:50.882182'); 


CREATE TABLE surveys (id INT AUTO_INCREMENT NOT NULL UNIQUE, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, person_id INT, title VARCHAR(100), active BOOLEAN NOT NULL, PRIMARY KEY (id), FOREIGN KEY (person_id) REFERENCES people (id));
INSERT INTO surveys VALUES(2,'2015-06-18 19:45:55.311620','2015-06-18 19:45:55.311620',1,'Dining Out',1);
INSERT INTO surveys VALUES(3,'2015-06-18 19:51:51.180820','2015-06-18 19:51:51.180820',1,'Home Entertainment Survey',1);
INSERT INTO surveys VALUES(4,'2015-06-18 19:57:17.390979','2015-06-18 19:57:17.390979',2,'Car Buying Survey',1);
INSERT INTO surveys VALUES(5,'2015-06-19 00:41:01.780355','2015-06-19 00:41:01.780355',5,'Mortgage Survey',1);
INSERT INTO surveys VALUES(6,'2015-06-19 00:43:19.087294','2015-06-19 00:43:19.087294',3,'Vacation Survey',1);


CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL UNIQUE, sequence INT NOT NULL, question VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, survey_id INT, PRIMARY KEY (id), FOREIGN KEY (survey_id) REFERENCES surveys (id));
INSERT INTO questions VALUES(2,1,'How often do you and your family eat in restaurants?','2015-06-18 19:36:32.549062','2015-06-18 19:36:32.549062',2);
INSERT INTO questions VALUES(3,2,'What is the average total of your bill when dining out?','2015-06-18 19:36:32.572428','2015-06-18 19:36:32.572428',2);
INSERT INTO questions VALUES(4,3,'What is your average party size?','2015-06-18 19:45:55.358999','2015-06-18 19:45:55.358999',2);
INSERT INTO questions VALUES(7,1,'What is your preferred form of home entertainment','2015-06-18 19:51:51.197725','2015-06-18 19:51:51.197725',3);
INSERT INTO questions VALUES(8,2,'On average, how much do you spend a month on the above?','2015-06-18 19:51:51.216159','2015-06-18 19:51:51.216159',3);
INSERT INTO questions VALUES(9,3,'What is your household size?','2015-06-18 19:51:51.237687','2015-06-18 19:51:51.237687',3);
INSERT INTO questions VALUES(10,1,'What kind of vehicle are you interested in purchasing?','2015-06-18 19:57:17.407479','2015-06-18 19:57:17.407479',4);
INSERT INTO questions VALUES(11,2,'What is your budget?','2015-06-18 19:57:17.423588','2015-06-18 19:57:17.423588',4);
INSERT INTO questions VALUES(12,3,'How many miles do you travel a week?','2015-06-18 19:57:17.438913','2015-06-18 19:57:17.438913',4);
INSERT INTO questions VALUES(13,1,'What kind of mortgage do you have?','2015-06-19 00:41:01.787364','2015-06-19 00:41:01.787364',5);
INSERT INTO questions VALUES(14,2,'Have you considered refinancing your mortgage?','2015-06-19 00:41:01.827490','2015-06-19 00:41:01.827490',5);
INSERT INTO questions VALUES(15,3,'What is your current interest rate?','2015-06-19 00:41:01.844161','2015-06-19 00:41:01.844161',5);
INSERT INTO questions VALUES(16,1,'What is your ideal vacation destination?','2015-06-19 00:43:19.092317','2015-06-19 00:43:19.092317',6);
INSERT INTO questions VALUES(17,2,'What is your favorite thing to do on vacation?','2015-06-19 00:43:19.122888','2015-06-19 00:43:19.122888',6);
INSERT INTO questions VALUES(18,3,'How many vacations do you take a year?','2015-06-19 00:43:19.146579','2015-06-19 00:43:19.146579',6);


CREATE TABLE answers (id INT AUTO_INCREMENT NOT NULL UNIQUE, sequence INT NOT NULL, answer VARCHAR(150), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, question_id INT NOT NULL, PRIMARY KEY (id), FOREIGN KEY (question_id) REFERENCES questions (id));
INSERT INTO answers VALUES(13,1,'10+ times a week','2015-06-18 19:45:55.330607','2015-06-18 19:45:55.330607',2);
INSERT INTO answers VALUES(14,2,'6 - 10 times a week','2015-06-18 19:45:55.334960','2015-06-18 19:45:55.334960',2);
INSERT INTO answers VALUES(15,3,'1 - 5 times a week','2015-06-18 19:45:55.337337','2015-06-18 19:45:55.337337',2);
INSERT INTO answers VALUES(16,4,'Rarely','2015-06-18 19:45:55.341392','2015-06-18 19:45:55.341392',2);
INSERT INTO answers VALUES(17,1,'$100 + ','2015-06-18 19:45:55.349695','2015-06-18 19:45:55.349695',3);
INSERT INTO answers VALUES(18,2,'$51 - $100','2015-06-18 19:45:55.351153','2015-06-18 19:45:55.351153',3);
INSERT INTO answers VALUES(19,3,'$25 - $50','2015-06-18 19:45:55.352432','2015-06-18 19:45:55.352432',3);
INSERT INTO answers VALUES(20,4,'Under $25','2015-06-18 19:45:55.355376','2015-06-18 19:45:55.355376',3);
INSERT INTO answers VALUES(21,1,'6 +','2015-06-18 19:45:55.365513','2015-06-18 19:45:55.365513',4);
INSERT INTO answers VALUES(22,2,'3 - 5','2015-06-18 19:45:55.371432','2015-06-18 19:45:55.371432',4);
INSERT INTO answers VALUES(23,3,'2','2015-06-18 19:45:55.379693','2015-06-18 19:45:55.379693',4);
INSERT INTO answers VALUES(24,4,'1','2015-06-18 19:45:55.385341','2015-06-18 19:45:55.385341',4);
INSERT INTO answers VALUES(25,1,'Television','2015-06-18 19:51:51.204191','2015-06-18 19:51:51.204191',7);
INSERT INTO answers VALUES(26,2,'Movies','2015-06-18 19:51:51.205899','2015-06-18 19:51:51.205899',7);
INSERT INTO answers VALUES(27,3,'Video Games','2015-06-18 19:51:51.214599','2015-06-18 19:51:51.214599',7);
INSERT INTO answers VALUES(28,1,'$100 +','2015-06-18 19:51:51.217604','2015-06-18 19:51:51.217604',8);
INSERT INTO answers VALUES(29,2,'$51 - $100','2015-06-18 19:51:51.218902','2015-06-18 19:51:51.218902',8);
INSERT INTO answers VALUES(30,3,'$25 - $50','2015-06-18 19:51:51.222352','2015-06-18 19:51:51.222352',8);
INSERT INTO answers VALUES(31,4,'Under $25','2015-06-18 19:51:51.227964','2015-06-18 19:51:51.227964',8);
INSERT INTO answers VALUES(32,1,'6 +','2015-06-18 19:51:51.239251','2015-06-18 19:51:51.239251',9);
INSERT INTO answers VALUES(33,2,'3 - 5','2015-06-18 19:51:51.240472','2015-06-18 19:51:51.240472',9);
INSERT INTO answers VALUES(34,3,'2','2015-06-18 19:51:51.241829','2015-06-18 19:51:51.241829',9);
INSERT INTO answers VALUES(35,4,'1','2015-06-18 19:51:51.243592','2015-06-18 19:51:51.243592',9);
INSERT INTO answers VALUES(36,1,'Sedan','2015-06-18 19:57:17.409091','2015-06-18 19:57:17.409091',10);
INSERT INTO answers VALUES(37,2,'SUV','2015-06-18 19:57:17.411954','2015-06-18 19:57:17.411954',10);
INSERT INTO answers VALUES(38,3,'Van','2015-06-18 19:57:17.414723','2015-06-18 19:57:17.414723',10);
INSERT INTO answers VALUES(39,4,'Truck','2015-06-18 19:57:17.421981','2015-06-18 19:57:17.421981',10);
INSERT INTO answers VALUES(40,1,'$65,000 + ','2015-06-18 19:57:17.424764','2015-06-18 19:57:17.424764',11);
INSERT INTO answers VALUES(41,2,'$40,000 - $64,999','2015-06-18 19:57:17.427723','2015-06-18 19:57:17.427723',11);
INSERT INTO answers VALUES(42,3,'$25,000 - $39,999','2015-06-18 19:57:17.435516','2015-06-18 19:57:17.435516',11);
INSERT INTO answers VALUES(43,4,'Under $25,000','2015-06-18 19:57:17.437194','2015-06-18 19:57:17.437194',11);
INSERT INTO answers VALUES(44,1,'101 + ','2015-06-18 19:57:17.443084','2015-06-18 19:57:17.443084',12);
INSERT INTO answers VALUES(45,2,'51 - 100','2015-06-18 19:57:17.446962','2015-06-18 19:57:17.446962',12);
INSERT INTO answers VALUES(46,3,'0 - 50','2015-06-18 19:57:17.448635','2015-06-18 19:57:17.448635',12);
INSERT INTO answers VALUES(47,4,'Even less than that','2015-06-18 19:57:17.452616','2015-06-18 19:57:17.452616',12);
INSERT INTO answers VALUES(48,1,'30 year fixed','2015-06-19 00:41:01.795678','2015-06-19 00:41:01.795678',13);
INSERT INTO answers VALUES(49,2,'15 year fixed','2015-06-19 00:41:01.802235','2015-06-19 00:41:01.802235',13);
INSERT INTO answers VALUES(50,3,'Adjustable Rate','2015-06-19 00:41:01.816616','2015-06-19 00:41:01.816616',13);
INSERT INTO answers VALUES(51,4,'N/A','2015-06-19 00:41:01.819034','2015-06-19 00:41:01.819034',13);
INSERT INTO answers VALUES(52,1,'Yes','2015-06-19 00:41:01.832977','2015-06-19 00:41:01.832977',14);
INSERT INTO answers VALUES(53,2,'No','2015-06-19 00:41:01.841019','2015-06-19 00:41:01.841019',14);
INSERT INTO answers VALUES(54,1,'Over 6%','2015-06-19 00:41:01.851015','2015-06-19 00:41:01.851015',15);
INSERT INTO answers VALUES(55,2,'4.5 - 5.9%','2015-06-19 00:41:01.863171','2015-06-19 00:41:01.863171',15);
INSERT INTO answers VALUES(56,3,'3 - 4.4%','2015-06-19 00:41:01.865021','2015-06-19 00:41:01.865021',15);
INSERT INTO answers VALUES(57,4,'Under 3%','2015-06-19 00:41:01.870776','2015-06-19 00:41:01.870776',15);
INSERT INTO answers VALUES(58,1,'Tropical / Beach','2015-06-19 00:43:19.104107','2015-06-19 00:43:19.104107',16);
INSERT INTO answers VALUES(59,2,'Mountains','2015-06-19 00:43:19.112334','2015-06-19 00:43:19.112334',16);
INSERT INTO answers VALUES(60,3,'Theme Parks','2015-06-19 00:43:19.117502','2015-06-19 00:43:19.117502',16);
INSERT INTO answers VALUES(61,4,'City center','2015-06-19 00:43:19.119212','2015-06-19 00:43:19.119212',16);
INSERT INTO answers VALUES(62,1,'Rest and Relaxation','2015-06-19 00:43:19.128305','2015-06-19 00:43:19.128305',17);
INSERT INTO answers VALUES(63,2,'Arts and Culture','2015-06-19 00:43:19.136327','2015-06-19 00:43:19.136327',17);
INSERT INTO answers VALUES(64,3,'Nightlife','2015-06-19 00:43:19.137983','2015-06-19 00:43:19.137983',17);
INSERT INTO answers VALUES(65,4,'Family Fun','2015-06-19 00:43:19.139485','2015-06-19 00:43:19.139485',17);
INSERT INTO answers VALUES(66,1,'3 +','2015-06-19 00:43:19.152982','2015-06-19 00:43:19.152982',18);
INSERT INTO answers VALUES(67,2,'2','2015-06-19 00:43:19.155520','2015-06-19 00:43:19.155520',18);
INSERT INTO answers VALUES(68,3,'1','2015-06-19 00:43:19.159810','2015-06-19 00:43:19.159810',18);
INSERT INTO answers VALUES(69,4,'I never go on vacation.','2015-06-19 00:43:19.165236','2015-06-19 00:43:19.165236',18);


CREATE TABLE recorded_answers (id INT AUTO_INCREMENT NOT NULL UNIQUE, user_id INT, answer_id INT, survey_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY (id), FOREIGN KEY (answer_id) REFERENCES answers (id), FOREIGN KEY (user_id) REFERENCES people (id));
INSERT INTO recorded_answers VALUES(334,1,13,2,'2015-06-23 16:13:50.935354','2015-06-23 16:13:50.935354');
INSERT INTO recorded_answers VALUES(335,1,18,2,'2015-06-23 16:13:50.942060','2015-06-23 16:13:50.942060');
INSERT INTO recorded_answers VALUES(336,1,21,2,'2015-06-23 16:13:50.950453','2015-06-23 16:13:50.950453');
INSERT INTO recorded_answers VALUES(337,2,13,2,'2015-06-23 16:13:50.958102','2015-06-23 16:13:50.958102');
INSERT INTO recorded_answers VALUES(338,2,17,2,'2015-06-23 16:13:50.966488','2015-06-23 16:13:50.966488');
INSERT INTO recorded_answers VALUES(339,2,24,2,'2015-06-23 16:13:50.974458','2015-06-23 16:13:50.974458');
INSERT INTO recorded_answers VALUES(340,3,14,2,'2015-06-23 16:13:50.983294','2015-06-23 16:13:50.983294');
INSERT INTO recorded_answers VALUES(341,3,18,2,'2015-06-23 16:13:50.989565','2015-06-23 16:13:50.989565');
INSERT INTO recorded_answers VALUES(342,3,21,2,'2015-06-23 16:13:51.007106','2015-06-23 16:13:51.007106');
INSERT INTO recorded_answers VALUES(343,4,16,2,'2015-06-23 16:13:51.017397','2015-06-23 16:13:51.017397');
INSERT INTO recorded_answers VALUES(344,4,19,2,'2015-06-23 16:13:51.026754','2015-06-23 16:13:51.026754');
INSERT INTO recorded_answers VALUES(345,4,22,2,'2015-06-23 16:13:51.045474','2015-06-23 16:13:51.045474');
INSERT INTO recorded_answers VALUES(346,5,16,2,'2015-06-23 16:13:51.064870','2015-06-23 16:13:51.064870');
INSERT INTO recorded_answers VALUES(347,5,18,2,'2015-06-23 16:13:51.077612','2015-06-23 16:13:51.077612');
INSERT INTO recorded_answers VALUES(348,5,23,2,'2015-06-23 16:13:51.087535','2015-06-23 16:13:51.087535');
INSERT INTO recorded_answers VALUES(349,6,13,2,'2015-06-23 16:13:51.095076','2015-06-23 16:13:51.095076');
INSERT INTO recorded_answers VALUES(350,6,18,2,'2015-06-23 16:13:51.133785','2015-06-23 16:13:51.133785');
INSERT INTO recorded_answers VALUES(351,6,22,2,'2015-06-23 16:13:51.144741','2015-06-23 16:13:51.144741');
INSERT INTO recorded_answers VALUES(352,7,15,2,'2015-06-23 16:13:51.157520','2015-06-23 16:13:51.157520');
INSERT INTO recorded_answers VALUES(353,7,17,2,'2015-06-23 16:13:51.168407','2015-06-23 16:13:51.168407');
INSERT INTO recorded_answers VALUES(354,7,24,2,'2015-06-23 16:13:51.182140','2015-06-23 16:13:51.182140');
INSERT INTO recorded_answers VALUES(355,9,16,2,'2015-06-23 16:13:51.192156','2015-06-23 16:13:51.192156');
INSERT INTO recorded_answers VALUES(356,9,20,2,'2015-06-23 16:13:51.204219','2015-06-23 16:13:51.204219');
INSERT INTO recorded_answers VALUES(357,9,21,2,'2015-06-23 16:13:51.218790','2015-06-23 16:13:51.218790');
INSERT INTO recorded_answers VALUES(358,10,14,2,'2015-06-23 16:13:51.230870','2015-06-23 16:13:51.230870');
INSERT INTO recorded_answers VALUES(359,10,20,2,'2015-06-23 16:13:51.244070','2015-06-23 16:13:51.244070');
INSERT INTO recorded_answers VALUES(360,10,23,2,'2015-06-23 16:13:51.254502','2015-06-23 16:13:51.254502');
INSERT INTO recorded_answers VALUES(361,2,27,3,'2015-06-23 16:13:51.264267','2015-06-23 16:13:51.264267');
INSERT INTO recorded_answers VALUES(362,2,28,3,'2015-06-23 16:13:51.276111','2015-06-23 16:13:51.276111');
INSERT INTO recorded_answers VALUES(363,2,32,3,'2015-06-23 16:13:51.287224','2015-06-23 16:13:51.287224');
INSERT INTO recorded_answers VALUES(364,3,25,3,'2015-06-23 16:13:51.298496','2015-06-23 16:13:51.298496');
INSERT INTO recorded_answers VALUES(365,3,29,3,'2015-06-23 16:13:51.318376','2015-06-23 16:13:51.318376');
INSERT INTO recorded_answers VALUES(366,3,33,3,'2015-06-23 16:13:51.339799','2015-06-23 16:13:51.339799');
INSERT INTO recorded_answers VALUES(367,4,25,3,'2015-06-23 16:13:51.350772','2015-06-23 16:13:51.350772');
INSERT INTO recorded_answers VALUES(368,4,29,3,'2015-06-23 16:13:51.360482','2015-06-23 16:13:51.360482');
INSERT INTO recorded_answers VALUES(369,4,34,3,'2015-06-23 16:13:51.372727','2015-06-23 16:13:51.372727');
INSERT INTO recorded_answers VALUES(370,5,26,3,'2015-06-23 16:13:51.384148','2015-06-23 16:13:51.384148');
INSERT INTO recorded_answers VALUES(371,5,31,3,'2015-06-23 16:13:51.394658','2015-06-23 16:13:51.394658');
INSERT INTO recorded_answers VALUES(372,5,35,3,'2015-06-23 16:13:51.403830','2015-06-23 16:13:51.403830');
INSERT INTO recorded_answers VALUES(373,6,26,3,'2015-06-23 16:13:51.413729','2015-06-23 16:13:51.413729');
INSERT INTO recorded_answers VALUES(374,6,31,3,'2015-06-23 16:13:51.427586','2015-06-23 16:13:51.427586');
INSERT INTO recorded_answers VALUES(375,6,35,3,'2015-06-23 16:13:51.438041','2015-06-23 16:13:51.438041');
INSERT INTO recorded_answers VALUES(376,7,26,3,'2015-06-23 16:13:51.447692','2015-06-23 16:13:51.447692');
INSERT INTO recorded_answers VALUES(377,7,31,3,'2015-06-23 16:13:51.458763','2015-06-23 16:13:51.458763');
INSERT INTO recorded_answers VALUES(378,7,35,3,'2015-06-23 16:13:51.468134','2015-06-23 16:13:51.468134');
INSERT INTO recorded_answers VALUES(379,8,26,3,'2015-06-23 16:13:51.479730','2015-06-23 16:13:51.479730');
INSERT INTO recorded_answers VALUES(380,8,31,3,'2015-06-23 16:13:51.491539','2015-06-23 16:13:51.491539');
INSERT INTO recorded_answers VALUES(381,8,35,3,'2015-06-23 16:13:51.503125','2015-06-23 16:13:51.503125');
INSERT INTO recorded_answers VALUES(382,9,25,3,'2015-06-23 16:13:51.559463','2015-06-23 16:13:51.559463');
INSERT INTO recorded_answers VALUES(383,9,28,3,'2015-06-23 16:13:51.571788','2015-06-23 16:13:51.571788');
INSERT INTO recorded_answers VALUES(384,9,32,3,'2015-06-23 16:13:51.584925','2015-06-23 16:13:51.584925');
INSERT INTO recorded_answers VALUES(385,2,36,4,'2015-06-23 16:13:51.596542','2015-06-23 16:13:51.596542');
INSERT INTO recorded_answers VALUES(386,2,40,4,'2015-06-23 16:13:51.605208','2015-06-23 16:13:51.605208');
INSERT INTO recorded_answers VALUES(387,2,47,4,'2015-06-23 16:13:51.613389','2015-06-23 16:13:51.613389');
INSERT INTO recorded_answers VALUES(388,3,38,4,'2015-06-23 16:13:51.623469','2015-06-23 16:13:51.623469');
INSERT INTO recorded_answers VALUES(389,3,42,4,'2015-06-23 16:13:51.629970','2015-06-23 16:13:51.629970');
INSERT INTO recorded_answers VALUES(390,3,44,4,'2015-06-23 16:13:51.636608','2015-06-23 16:13:51.636608');
INSERT INTO recorded_answers VALUES(391,5,39,4,'2015-06-23 16:13:51.642079','2015-06-23 16:13:51.642079');
INSERT INTO recorded_answers VALUES(392,5,41,4,'2015-06-23 16:13:51.648001','2015-06-23 16:13:51.648001');
INSERT INTO recorded_answers VALUES(393,5,44,4,'2015-06-23 16:13:51.653440','2015-06-23 16:13:51.653440');
INSERT INTO recorded_answers VALUES(394,7,36,4,'2015-06-23 16:13:51.658534','2015-06-23 16:13:51.658534');
INSERT INTO recorded_answers VALUES(395,7,40,4,'2015-06-23 16:13:51.665411','2015-06-23 16:13:51.665411');
INSERT INTO recorded_answers VALUES(396,7,45,4,'2015-06-23 16:13:51.671092','2015-06-23 16:13:51.671092');
INSERT INTO recorded_answers VALUES(397,8,39,4,'2015-06-23 16:13:51.676957','2015-06-23 16:13:51.676957');
INSERT INTO recorded_answers VALUES(398,8,42,4,'2015-06-23 16:13:51.684097','2015-06-23 16:13:51.684097');
INSERT INTO recorded_answers VALUES(399,8,45,4,'2015-06-23 16:13:51.690053','2015-06-23 16:13:51.690053');
INSERT INTO recorded_answers VALUES(400,9,37,4,'2015-06-23 16:13:51.697072','2015-06-23 16:13:51.697072');
INSERT INTO recorded_answers VALUES(401,9,41,4,'2015-06-23 16:13:51.703235','2015-06-23 16:13:51.703235');
INSERT INTO recorded_answers VALUES(402,9,44,4,'2015-06-23 16:13:51.709277','2015-06-23 16:13:51.709277');
INSERT INTO recorded_answers VALUES(403,10,36,4,'2015-06-23 16:13:51.716595','2015-06-23 16:13:51.716595');
INSERT INTO recorded_answers VALUES(404,10,40,4,'2015-06-23 16:13:51.724994','2015-06-23 16:13:51.724994');
INSERT INTO recorded_answers VALUES(405,10,44,4,'2015-06-23 16:13:51.732623','2015-06-23 16:13:51.732623');
INSERT INTO recorded_answers VALUES(406,10,36,4,'2015-06-23 16:13:51.738885','2015-06-23 16:13:51.738885');
INSERT INTO recorded_answers VALUES(407,10,40,4,'2015-06-23 16:13:51.745983','2015-06-23 16:13:51.745983');
INSERT INTO recorded_answers VALUES(408,10,44,4,'2015-06-23 16:13:51.836001','2015-06-23 16:13:51.836001');
INSERT INTO recorded_answers VALUES(409,1,48,5,'2015-06-23 16:13:51.849576','2015-06-23 16:13:51.849576');
INSERT INTO recorded_answers VALUES(410,1,53,5,'2015-06-23 16:13:51.863708','2015-06-23 16:13:51.863708');
INSERT INTO recorded_answers VALUES(411,1,55,5,'2015-06-23 16:13:51.885105','2015-06-23 16:13:51.885105');
INSERT INTO recorded_answers VALUES(412,2,49,5,'2015-06-23 16:13:51.898890','2015-06-23 16:13:51.898890');
INSERT INTO recorded_answers VALUES(413,2,52,5,'2015-06-23 16:13:51.910933','2015-06-23 16:13:51.910933');
INSERT INTO recorded_answers VALUES(414,2,54,5,'2015-06-23 16:13:51.932906','2015-06-23 16:13:51.932906');
INSERT INTO recorded_answers VALUES(415,3,48,5,'2015-06-23 16:13:51.942781','2015-06-23 16:13:51.942781');
INSERT INTO recorded_answers VALUES(416,3,52,5,'2015-06-23 16:13:51.954326','2015-06-23 16:13:51.954326');
INSERT INTO recorded_answers VALUES(417,3,55,5,'2015-06-23 16:13:51.961109','2015-06-23 16:13:51.961109');
INSERT INTO recorded_answers VALUES(418,4,49,5,'2015-06-23 16:13:51.966825','2015-06-23 16:13:51.966825');
INSERT INTO recorded_answers VALUES(419,4,52,5,'2015-06-23 16:13:51.976314','2015-06-23 16:13:51.976314');
INSERT INTO recorded_answers VALUES(420,4,56,5,'2015-06-23 16:13:51.981802','2015-06-23 16:13:51.981802');
INSERT INTO recorded_answers VALUES(421,5,50,5,'2015-06-23 16:13:51.988727','2015-06-23 16:13:51.988727');
INSERT INTO recorded_answers VALUES(422,5,53,5,'2015-06-23 16:13:51.994449','2015-06-23 16:13:51.994449');
INSERT INTO recorded_answers VALUES(423,5,55,5,'2015-06-23 16:13:52.001135','2015-06-23 16:13:52.001135');
INSERT INTO recorded_answers VALUES(424,7,51,5,'2015-06-23 16:13:52.007586','2015-06-23 16:13:52.007586');
INSERT INTO recorded_answers VALUES(425,7,52,5,'2015-06-23 16:13:52.015822','2015-06-23 16:13:52.015822');
INSERT INTO recorded_answers VALUES(426,7,55,5,'2015-06-23 16:13:52.022701','2015-06-23 16:13:52.022701');
INSERT INTO recorded_answers VALUES(427,8,50,5,'2015-06-23 16:13:52.030584','2015-06-23 16:13:52.030584');
INSERT INTO recorded_answers VALUES(428,8,52,5,'2015-06-23 16:13:52.073853','2015-06-23 16:13:52.073853');
INSERT INTO recorded_answers VALUES(429,8,54,5,'2015-06-23 16:13:52.084889','2015-06-23 16:13:52.084889');
INSERT INTO recorded_answers VALUES(430,9,51,5,'2015-06-23 16:13:52.095957','2015-06-23 16:13:52.095957');
INSERT INTO recorded_answers VALUES(431,9,52,5,'2015-06-23 16:13:52.108209','2015-06-23 16:13:52.108209');
INSERT INTO recorded_answers VALUES(432,9,57,5,'2015-06-23 16:13:52.120400','2015-06-23 16:13:52.120400');
INSERT INTO recorded_answers VALUES(433,10,48,5,'2015-06-23 16:13:52.131706','2015-06-23 16:13:52.131706');
INSERT INTO recorded_answers VALUES(434,10,53,5,'2015-06-23 16:13:52.149159','2015-06-23 16:13:52.149159');
INSERT INTO recorded_answers VALUES(435,10,56,5,'2015-06-23 16:13:52.160283','2015-06-23 16:13:52.160283');
INSERT INTO recorded_answers VALUES(436,1,59,6,'2015-06-23 16:13:52.172851','2015-06-23 16:13:52.172851');
INSERT INTO recorded_answers VALUES(437,1,62,6,'2015-06-23 16:13:52.186437','2015-06-23 16:13:52.186437');
INSERT INTO recorded_answers VALUES(438,1,66,6,'2015-06-23 16:13:52.196832','2015-06-23 16:13:52.196832');
INSERT INTO recorded_answers VALUES(439,2,58,6,'2015-06-23 16:13:52.208287','2015-06-23 16:13:52.208287');
INSERT INTO recorded_answers VALUES(440,2,63,6,'2015-06-23 16:13:52.234547','2015-06-23 16:13:52.234547');
INSERT INTO recorded_answers VALUES(441,2,68,6,'2015-06-23 16:13:52.245925','2015-06-23 16:13:52.245925');
INSERT INTO recorded_answers VALUES(442,3,59,6,'2015-06-23 16:13:52.257266','2015-06-23 16:13:52.257266');
INSERT INTO recorded_answers VALUES(443,3,63,6,'2015-06-23 16:13:52.268519','2015-06-23 16:13:52.268519');
INSERT INTO recorded_answers VALUES(444,3,69,6,'2015-06-23 16:13:52.281071','2015-06-23 16:13:52.281071');
INSERT INTO recorded_answers VALUES(445,5,58,6,'2015-06-23 16:13:52.292251','2015-06-23 16:13:52.292251');
INSERT INTO recorded_answers VALUES(446,5,65,6,'2015-06-23 16:13:52.302870','2015-06-23 16:13:52.302870');
INSERT INTO recorded_answers VALUES(447,5,69,6,'2015-06-23 16:13:52.312020','2015-06-23 16:13:52.312020');
INSERT INTO recorded_answers VALUES(448,6,59,6,'2015-06-23 16:13:52.323029','2015-06-23 16:13:52.323029');
INSERT INTO recorded_answers VALUES(449,6,64,6,'2015-06-23 16:13:52.353739','2015-06-23 16:13:52.353739');
INSERT INTO recorded_answers VALUES(450,6,69,6,'2015-06-23 16:13:52.365599','2015-06-23 16:13:52.365599');
INSERT INTO recorded_answers VALUES(451,7,60,6,'2015-06-23 16:13:52.377700','2015-06-23 16:13:52.377700');
INSERT INTO recorded_answers VALUES(452,7,64,6,'2015-06-23 16:13:52.389360','2015-06-23 16:13:52.389360');
INSERT INTO recorded_answers VALUES(453,7,66,6,'2015-06-23 16:13:52.401648','2015-06-23 16:13:52.401648');
INSERT INTO recorded_answers VALUES(454,9,61,6,'2015-06-23 16:13:52.413080','2015-06-23 16:13:52.413080');
INSERT INTO recorded_answers VALUES(455,9,63,6,'2015-06-23 16:13:52.427578','2015-06-23 16:13:52.427578');
INSERT INTO recorded_answers VALUES(456,9,67,6,'2015-06-23 16:13:52.438860','2015-06-23 16:13:52.438860');
INSERT INTO recorded_answers VALUES(457,10,60,6,'2015-06-23 16:13:52.458737','2015-06-23 16:13:52.458737');
INSERT INTO recorded_answers VALUES(458,10,62,6,'2015-06-23 16:13:52.469795','2015-06-23 16:13:52.469795');
INSERT INTO recorded_answers VALUES(459,10,66,6,'2015-06-23 16:13:52.477987','2015-06-23 16:13:52.477987');
