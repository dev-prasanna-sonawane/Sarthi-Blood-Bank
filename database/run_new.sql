
-- 1. ADMIN TABLE(admin_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`admin_details` (`admin_id` INT NOT NULL AUTO_INCREMENT , `admin_name` VARCHAR(100) NOT NULL , `admin_password` VARCHAR(100) NOT NULL , PRIMARY KEY (`admin_id`), UNIQUE (`admin_name`));

-- Working with data(DML commands)

-- Inserting data
INSERT INTO `admin_details` (`admin_id`, `admin_name`, `admin_password`) VALUES ('1', 'Prasanna', 'admin1');



--2. Donor TABLE(donor_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`donor_details` (`donor_id` INT NOT NULL AUTO_INCREMENT , `donor_name` VARCHAR(100) NOT NULL , `age` INT(20) NOT NULL , `gender` VARCHAR(50) NOT NULL , `blood_group` VARCHAR(50) NOT NULL , `address` TEXT NOT NULL , `mobile_no` DOUBLE NOT NULL , `alternate_mobile_no` DOUBLE NOT NULL , `email` VARCHAR(50) NOT NULL , `donor_password` VARCHAR(50) NOT NULL , `password_reset_answer` VARCHAR(50) NOT NULL , `donor_list` VARCHAR(10) NOT NULL , PRIMARY KEY (`donor_id`), UNIQUE (`email`));

-- Working with data(DML commands)
-- Inserting data
INSERT INTO `donor_details` ( `donor_id`,`donor_name`, `age`, `gender`, `blood_group`, `address`, `mobile_no`, `alternate_mobile_no`, `email`, `donor_password`,`password_reset_answer`,`donor_list`) VALUES ('1','prasanna', '21', 'male', 'B+', 'Pune', '8956034889', '8954052171', '2003psf@gmail.com','prasanna1','Java','on');



-- 3. Appointments TABLE(appointments)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`appointments` (`appointment_id` INT NOT NULL , `appointment_date` DATE NOT NULL ,`aapointment_time` TIME NOT NULL,`donor_id` INT NOT NULL , `donor_name` VARCHAR(100) NOT NULL , `status` VARCHAR(50) NOT NULL ,`donated` VARCHAR(10)NOT NULL,`appointment_request_time` TIMESTAMP NOT NULL, PRIMARY KEY (`appointment_id`));

-- Adding Foreign Key constraint
ALTER TABLE `appointments` ADD FOREIGN KEY (`donor_id`) REFERENCES `donor_details`(`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Working with data(DML commands)

-- Inserting data
INSERT INTO `appointments` (`donor_id`,`donor_name`, `appointment_id`, `appointment_date`,`appointment_time`, `status`,`donated`) VALUES ('1','prasanna', '246', '2024-04-30','16:00:00','Pending','Pending');



-- 4. Blood Donation Camp TABLE(camp_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`camp_details` (`camp_id` INT NOT NULL AUTO_INCREMENT , `camp_name` VARCHAR(100) NOT NULL , `camp_address` TEXT NOT NULL , `camp_date` DATE NOT NULL , `camp_start_time` TIME NOT NULL , `camp_end_time` TIME NOT NULL , `org_name` VARCHAR(100) NOT NULL , `o_name` VARCHAR(100) NOT NULL , `o_mobile_no` DOUBLE NOT NULL , `o_email` VARCHAR(50) NOT NULL , `co_name` VARCHAR(100) NOT NULL , `co_mobile_no` DOUBLE NOT NULL , PRIMARY KEY (`camp_id`)) ;

-- Working with data(DML commands)

-- Inserting data
INSERT INTO `camp_details` (`camp_id`, `org_name`, `o_name`, `o_mobile_no`, `o_email`, `co_name`, `co_mobile_no`, `camp_name`, `camp_address`, `camp_date`, `camp_start_time`, `camp_end_time`) VALUES ('1', 'Raktache Nate', 'Prasanna', '8956034889', '2003psf@gmail.com', 'Tushar', '8954038893', 'Blood Connect', '310 Ghorpade Peth,Pune', '2024-03-31', '08:00:00', '18:00:00');



-- 5. Blood Stock TABLE(blood_stock)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`blood_stock` (`blood_id` INT NOT NULL AUTO_INCREMENT , `blood_group` VARCHAR(10) NOT NULL , `units` INT NOT NULL , PRIMARY KEY (`blood_id`), UNIQUE (`blood_group`));

-- Working with data(DML commands)

-- Inserting data
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('1', 'A+', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('2', 'A-', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('3', 'B+', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('4', 'B-', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('5', 'AB+', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('6', 'AB-', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('7', 'O+', '200');
INSERT INTO `blood_stock` (`blood_id`, `blood_group`, `units`) VALUES ('8', 'O-', '200');

