use quizzDB;
create table QUIZZ(id int primary key not null auto_increment, title VARCHAR(200));
create table QUESTION(id int primary key not null auto_increment, texte VARCHAR(200));
create table REPONSE(id int primary key not null auto_increment, texte VARCHAR(200), isValid BOOLEAN);
ALTER TABLE QUESTION ADD (numQuizzId INT, FOREIGN KEY (numQuizzId) REFERENCES QUIZZ(id));
ALTER TABLE REPONSE ADD (numQuestionId INT, FOREIGN KEY (numQuestionId) REFERENCES QUESTION(id));

INSERT INTO QUIZZ(title) values("Question pour un champion");
INSERT INTO QUESTION(texte,numQuizzId) values("En quelle année est née Johnny Hallyday", 1);
INSERT INTO REPONSE(texte,isValid,numQuestionId) values("1943",true,1);
INSERT INTO REPONSE(texte,isValid,numQuestionId) values("1975",false,1);
INSERT INTO QUESTION(texte,numQuizzId) values("Quel est l'âge de Kévin",1);
INSERT INTO REPONSE(texte,isValid,numQuestionId) values("25", true, 2);
INSERT INTO REPONSE(texte,isValid,numQuestionId) values("49",false,2);