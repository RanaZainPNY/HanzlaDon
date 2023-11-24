<?php
/**
* 	Interacting with MySQL DB in RDS
*
*	@author Swinburne University of Technology
*/
require 'photo.php';
require_once 'constants.php';

class MyDB 
{
	private $dbh; 
	
	// Constructor, establish a connection to the database in RDS
	public function __construct() {
		try {
			$dsn = "mysql:host=localhost;dbname=photos";
			$this->dbh = new PDO ( $dsn, "admin", "Oraclecloud@2023" );
			$this->dbh->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			error_log($e);
			echo $e;
		}
	}
	
	// Retrieve all records stored in the database table DB_PHOTO_TABLE_NAME. Return an array of Photo objects
	public function getAllPhotos() {
		$photos = array ();
		try {
			$stm = $this->dbh->query ( 'SELECT * FROM photosDB' );
			foreach ( $stm as $row ) {
				array_push ( $photos, new Photo ( $row ['photo_title'], 
												$row ['description'],
												$row ['creation_date'],
												$row ['keywords'],
												$row ['object_reference']) );
			}
			return $photos;
		} catch ( PDOException $e ) {
			error_log($e);
			echo $e;
		}
	}
}
?>