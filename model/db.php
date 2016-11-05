<?php   

    $dsn = 'mysql:host=localhost;dbname=patient_visits';
	$user = 'root';
	$pass = '';
  
    	try {
    		$dbh = new PDO('mysql:host=localhost;dbname=patient_visits', 'root', '');
    		return $dbh;
    	} catch (PDOException $e) {
    		$error_message = $e-> getMessage();
    		exit();
    	}        
    	
    //function Search($searchQ){
    // $pdo = new PDO($connString, 'root', '');
    	
     //$result = $pdo->query("SELECT * FROM Patient WHERE first_name LIKE '%$searchQ%' OR last_name LIKE '$searchQ'") or die("Sorry, could not search!");
     //$result = $result->fetchAll();
     
    //}
?>