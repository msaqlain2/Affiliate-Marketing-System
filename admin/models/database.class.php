<?php

class database {
	public function connect() {
		try{
			$connect = new PDO('mysql:host=localhost;dbname=affiliate_marketing', 'root', 'root');
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connect;
		}
		catch(PDOException $e) {
			echo " Connection Failed " . $e->getMessage();
		}
	}
}


