

CREATE TABLE district (
id INT NOT NULL AUTO_INCREMENT,  
district_name VARCHAR(50) NOT NULL, 
PRIMARY KEY (id)
);
CREATE TABLE distributor (
id INT NOT NULL AUTO_INCREMENT,
distributor_name VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE sim_details (
id INT NOT NULL AUTO_INCREMENT,
distributor INT NOT NULL,
district INT NOT NULL,
phone_number_from_range BIGINT NOT NULL,
phone_number_to_range BIGINT NOT NULL,
IMSI_from_range BIGINT NOT NULL,
IMSI_to_range BIGINT NOT NULL,
sim_quantity INT NOT NULL,
sim_remarks VARCHAR(20) NULL,
PRIMARY KEY (id),
FOREIGN KEY (distributor)
	REFERENCES distributor(id)
	ON DELETE CASCADE,
FOREIGN KEY (district)
	REFERENCES district(id)
	ON DELETE CASCADE
);
CREATE TABLE activate_no (
id INT NOT NULL AUTO_INCREMENT,
phone_no BIGINT NOT NULL,
distributor INT NOT NULL,
date DATE,
district INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (distributor)
	REFERENCES distributor(id)
	ON DELETE CASCADE,
FOREIGN KEY (district)
	REFERENCES district(id)
	ON DELETE CASCADE
);


