USE test;
DROP TABLE Employees;
DROP TABLE Jobs;
DROP TABLE Activities;
DROP TABLE TimeTickets;
CREATE TABLE Employees(eID INTEGER NOT NULL AUTO_INCREMENT,
	Name VARCHAR(255),
	Email VARCHAR(30),
	Active BIT(1) NOT NULL DEFAULT 1,
	PRIMARY KEY (eID));
CREATE TABLE Jobs(jID INTEGER NOT NULL AUTO_INCREMENT,
	Name VARCHAR(20),
	PRIMARY KEY (jID));
CREATE TABLE Activities(aID INTEGER NOT NULL,
	jID INTEGER NOT NULL,
	Quantity INTEGER NOT NULL DEFAULT 0,
	Day DATE NOT NULL,
	Nickname VARCHAR(25),
	PRIMARY KEY (aID),
	FOREIGN KEY (jID) REFERENCES Jobs(jID));
CREATE TABLE TimeTickets(wID INTEGER NOT NULL AUTO_INCREMENT,
	eID INTEGER NOT NULL,
	aID INTEGER NOT NULL,
	Hours TINYINT UNSIGNED NOT NULL DEFAULT 0,
	Day DATE NOT NULL,
	PRIMARY KEY (wID),
	FOREIGN KEY (eID) REFERENCES Employees(eID),
	FOREIGN KEY (aID) REFERENCES Activities(aID));

INSERT INTO Employees (Name) VALUES ('Mike');
INSERT INTO Employees (Name) VALUES ('Liz');
INSERT INTO Employees (Name) VALUES ('Michelle');
INSERT INTO Employees (Name) VALUES ('Dylan');
INSERT INTO Employees (Name) VALUES ('Lee');
INSERT INTO Employees (Name) VALUES ('Frank');
INSERT INTO Employees (Name) VALUES ('Al');
INSERT INTO Employees (Name) VALUES ('Billy');
INSERT INTO Employees (Name) VALUES ('Sean');
INSERT INTO Employees (Name) VALUES ('Ant');
INSERT INTO Employees (Name) VALUES ('Bob');
INSERT INTO Employees (Name) VALUES ('Eileen');
INSERT INTO Employees (Name) VALUES ('DayLabor');
INSERT INTO Employees (Name) VALUES ('DayLabor');
INSERT INTO Jobs (Name) VALUES ('DPB');
INSERT INTO Jobs (Name) VALUES ('Elec');
INSERT INTO Jobs (Name) VALUES ('Cutlist');
INSERT INTO Jobs (Name) VALUES ('Mag');
INSERT INTO Jobs (Name) VALUES ('Big Disk');
INSERT INTO Jobs (Name) VALUES ('ClickerSP');
INSERT INTO Jobs (Name) VALUES ('TS');
INSERT INTO Jobs (Name) VALUES ('Wflr');
INSERT INTO Jobs (Name) VALUES ('Mflr');
INSERT INTO Jobs (Name) VALUES ('Markt');
INSERT INTO Jobs (Name) VALUES ('Sales');
INSERT INTO Jobs (Name) VALUES ('R&D');