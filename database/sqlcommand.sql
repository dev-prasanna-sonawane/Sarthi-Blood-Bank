
-- 1. ADMIN TABLE(admin_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`admin_details` (`admin_id` INT NOT NULL AUTO_INCREMENT , `admin_name` VARCHAR(100) NOT NULL , `admin_password` VARCHAR(255) NOT NULL , PRIMARY KEY (`admin_id`), UNIQUE (`admin_name`));

-- Deleting whole table
Drop TABLE `sarthibloodbank_db`.`admin_details`;

-- Deleting columns
ALTER TABLE `sarthibloodbank_db`.`admin_details` DROP `admin_id`;


-- Working with data(DML commands)

-- Inserting data
INSERT INTO `sarthibloodbank_db`.`admin_details` (`admin_id`, `admin_name`, `admin_password`) VALUES ('1', 'Prasanna', '$2y$10$gW99Iu.Py4S0GmJSZMobM.3fRkbhdtKvQd00Ax2NkN4XGTapBZUpO'); -- The hash is for admin1

-- Selecting data
SELECT * FROM `sarthibloodbank_db`.`admin_details`;

-- Updating data
UPDATE `sarthibloodbank_db`.`admin_details` SET `admin_name`='prasanna' WHERE `admin_id`='1';

-- Deleting rows
DELETE FROM `sarthibloodbank_db`.`admin_details` WHERE `admin_id` = 2;




--2. Donor TABLE(donor_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`donor_details` (`donor_id` INT NOT NULL AUTO_INCREMENT , `donor_name` VARCHAR(100) NOT NULL , `age` INT(20) NOT NULL , `gender` VARCHAR(50) NOT NULL , `blood_group` VARCHAR(50) NOT NULL , `address` TEXT NOT NULL , `mobile_no` DOUBLE NOT NULL , `alternate_mobile_no` DOUBLE NOT NULL , `email` VARCHAR(50) NOT NULL , `donor_password` VARCHAR(255) NOT NULL , `password_reset_answer` VARCHAR(50) NOT NULL , `donor_list` VARCHAR(10) NOT NULL , PRIMARY KEY (`donor_id`), UNIQUE (`email`));

-- Deleting whole table
Drop TABLE `sarthibloodbank_db`.`donor_details`;

-- Deleting columns
ALTER TABLE `sarthibloodbank_db`.`donor_details` DROP `donor_name`;


-- Working with data(DML commands)

-- Inserting data
INSERT INTO `sarthibloodbank_db`.`donor_details` ( `donor_id`,`donor_name`, `age`, `gender`, `blood_group`, `address`, `mobile_no`, `alternate_mobile_no`, `email`, `donor_password`,`password_reset_answer`,`donor_list`) VALUES ('1','prasanna', '21', 'male', 'B+', 'Pune', '8956034889', '8954052171', '2003psf@gmail.com','$2y$10$5FORe6PN2t80bJNkkS5zduHJbDQ0yk443gn9xDG2T1ha30DyjXdU6','java','on'); -- The hash is for prasanna1

-- Selecting data
SELECT * FROM `sarthibloodbank_db`.`donor_details` WHERE `donor_id`='1';

-- Updating data
UPDATE `sarthibloodbank_db`.`donor_details` SET `donor_name`='prasanna' WHERE `donor_id`='2';

-- Deleting rows
DELETE FROM `sarthibloodbank_db`.`donor_details` WHERE `donor_id` ='2';




-- 3. Appointments TABLE(appointments)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`appointments` (`appointment_id` INT NOT NULL , `appointment_date` DATE NOT NULL ,`aapointment_time` TIME NOT NULL,`donor_id` INT NOT NULL , `donor_name` VARCHAR(100) NOT NULL , `status` VARCHAR(50) NOT NULL ,`donated` VARCHAR(10)NOT NULL,`appointment_request_time` TIMESTAMP NOT NULL, PRIMARY KEY (`appointment_id`));

-- Deleting whole table
Drop TABLE `sarthibloodbank_db`.`appointments`;

-- Adding Foreign Key constraint
ALTER TABLE `sarthibloodbank_db`.`appointments` ADD FOREIGN KEY (`donor_id`) REFERENCES `donor_details`(`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Working with data(DML commands)

-- Inserting data
INSERT INTO `sarthibloodbank_db`.`appointments` (`donor_id`,`donor_name`, `appointment_id`, `appointment_date`,`appointment_time`, `status`,`donated`) VALUES ('1','prasanna', '246', '2025-12-30','16:00:00','Pending','Pending');

-- Selecting data
SELECT * FROM `sarthibloodbank_db`.`appointments`;

-- Updating data
UPDATE `sarthibloodbank_db`.`appointments` SET `status`='pending' WHERE `appointment_id` = '100';

-- Deleting rows
DELETE FROM `sarthibloodbank_db`.`appointments` WHERE `appointment_id` ='200';




-- 4. Blood Donation Camp TABLE(camp_details)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`camp_details` (`camp_id` INT NOT NULL AUTO_INCREMENT , `camp_name` VARCHAR(100) NOT NULL , `camp_address` TEXT NOT NULL , `camp_date` DATE NOT NULL , `camp_start_time` TIME NOT NULL , `camp_end_time` TIME NOT NULL , `org_name` VARCHAR(100) NOT NULL , `o_name` VARCHAR(100) NOT NULL , `o_mobile_no` DOUBLE NOT NULL , `o_email` VARCHAR(50) NOT NULL , `co_name` VARCHAR(100) NOT NULL , `co_mobile_no` DOUBLE NOT NULL , PRIMARY KEY (`camp_id`)) ;

-- Deleting whole table
Drop TABLE `sarthibloodbank_db`.`camp_details`;

-- Deleting columns
ALTER TABLE `sarthibloodbank_db`.`camp_details` DROP `camp_address`;


-- Working with data(DML commands)

-- Inserting data
INSERT INTO `sarthibloodbank_db`.`camp_details` (`camp_id`, `org_name`, `o_name`, `o_mobile_no`, `o_email`, `co_name`, `co_mobile_no`, `camp_name`, `camp_address`, `camp_date`, `camp_start_time`, `camp_end_time`) VALUES ('1', 'Raktache Nate', 'Prasanna', '8956034889', '2003psf@gmail.com', 'Tushar', '8954038893', 'Blood Connect', '310 Ghorpade Peth,Pune', '2025-12-31', '08:00:00', '18:00:00');

-- Selecting data
SELECT * FROM `sarthibloodbank_db`.`camp_details`;

-- Updating data
UPDATE `sarthibloodbank_db`.`camp_details` SET `camp_name`='Blood Connect' WHERE `camp_id`='1';

-- Deleting rows
DELETE FROM `sarthibloodbank_db`.`camp_details` WHERE `camp_id` ='2';




-- 5. Blood Inventory TABLE(blood_inventory)

-- Changing table structure(DDL commands)

-- Creating Table
CREATE TABLE `sarthibloodbank_db`.`blood_inventory` (`blood_id` INT NOT NULL AUTO_INCREMENT , `blood_group` VARCHAR(10) NOT NULL , `units` INT NOT NULL , PRIMARY KEY (`blood_id`), UNIQUE (`blood_group`));

-- Deleting whole table
Drop TABLE `sarthibloodbank_db`.`blood_inventory`;

-- Deleting columns
ALTER TABLE `sarthibloodbank_db`.`blood_inventory` DROP `blood_group`;


-- Working with data(DML commands)

-- Inserting data
INSERT INTO `sarthibloodbank_db`.`blood_inventory` (`blood_id`, `blood_group`, `units`) VALUES ('1', 'A+', '200');

-- Selecting data
SELECT * FROM `sarthibloodbank_db`.`blood_inventory`;

-- Updating data
UPDATE `sarthibloodbank_db`.`blood_inventory` SET `blood_group`='A+' WHERE `blood_id`='1';

-- Deleting rows
DELETE FROM `sarthibloodbank_db`.`blood_inventory` WHERE `blood_id` ='2';


