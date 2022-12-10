CREATE TABLE IF NOT EXISTS projects (
	id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR (255) not null 
) ENGINE=InnoDB;

INSERT INTO projects (name) values ("The First Project");
INSERT INTO projects (name) values ("And The Second Project");

