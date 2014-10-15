<?php
TestConfiguation::setup();
class TestConfiguration
{
        static function setup()
        {
                $lib = realpath(dirname(__FILE__).'/../../../lib/');
                set_include_path(get_include_path().PATH_SEPARATOR.$lib);
                require_once dirname(__FILE__).'/../application/bootstrap.php';
                self::$bootstrap = new Bootstrap('test');
        }

        static function setupDatabase()
        {
                $db = Zend_Registry::get('db');
                $db->query("DROP TABLE IF EXISTS places");
                		
                $db->query("CREATE TABLE places(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                date_created DATETIME NOT NULL,
                date_updated DATETIME NOT NULL,
                name VARCHAR(100) NOT NULL,
                address1 VARCHAR(100) NULL,
                address2 VARCHAR(100) NULL,
                address3 VARCHAR(100) NULL,
                town VARCHAR(75) NULL,
                county VARCHAR(75) NULL,
                postcode VARCHAR(75) NULL,
                country VARCHAR(75) NULL)"            
				);
                
                $db->query("INSERT INTO places (name, address1, town, county, postcode, date_created, dara_updated)
                		VALUES
                		('London Zoo', 'Regent Park', 'London', '','NW1 4RY', '2007-02-14 00:00:00', '2007-02-14 00:00:00'),
                		('Alton Towers', 'Regent Park', 'Alton', 'Staffordshire', 'ST10 4DB', '2007-02-20 00:00:00', '2007-02-20 00:00:00'),
                		('Coughton Court', '', 'Alcester', 'Warwickshire', 'B49 5JA', '2007-02-16 00:00:00', '2007-02-16 00:00:00')"          		
                );

                
        }
}