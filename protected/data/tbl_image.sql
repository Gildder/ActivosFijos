CREATE TABLE IF NOT EXISTS tbl_image(
	id_image int(11) NOT NULL AUTO_INCREMENT,
	id_user int(11) NOT NULL,
	title varchar(120) NOT NULL,
	folder varchar(120)NOT NULL,
	image varchar(120)NOT NULL,
	PRIMARY KEY(id_image)
);