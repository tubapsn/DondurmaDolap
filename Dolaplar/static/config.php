<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

/*
	$host		="localhost";
	$database 	="algida";
	$username	="root";
	$password	="";
*/    
    $host		="p1.alidemircioglu.com.tr";
	$database 	="dolap_web";
	$username	="dolap_web";
	$password	="iPm48a7!";
    

    $site_url = "http://localhost/dolaplar/";
    
	class DBConnect
	{

		function connectDB($database="",$username="",$password="",$host="")
		{

			try {
			    $connectDatabase = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
			} catch (PDOException $e) {
			    print "Hata!: " . $e->getMessage() . "<br/>";
			    die();
			}	
			return $connectDatabase;
		}

		function closeDB($connectDatabase)
		{
			$connectDatabase = null;
		}

	}

	$dbConnect = new DBConnect();
	$connectDatabase = $dbConnect->connectDB($database, $username, $password,$host);
    $connectDatabase->query("SET NAMES UTF8");