<?php 
    include 'db.php';
    
    class Doctor {
        // Works
        function getDoctor(){
            global $dbh;
            $query = 'SELECT * FROM Doctor';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addDoctor($first_name, $middle_name, $last_name, $phone, $email){
            global $dbh;
                   $address_id = $dbh->query('SELECT MAX(address_id) FROM Address')->fetch()['MAX(address_id)'];
                   $query = 'INSERT INTO Doctor(address_id, first_name, middle_name, last_name, phone, email) VALUES';
                   $query .= "($address_id, '$first_name', '$middle_name', '$last_name', '$phone', '$email')";
                   $dbh->exec($query);
        }
        
        //work
        function deleteDoctor($doctor_id){
            global $dbh;
            $query = "DELETE FROM Doctor WHERE doctor_id = '$doctor_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        
        // Works
        function editDoctor($doctor_id, $first_name, $middle_name, $last_name, $phone, $email){
            global $dbh;
            $query = "UPDATE Doctor 
                    SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', phone = '$phone', email = '$email'
                    WHERE doctor_id = '$doctor_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        function getOneDoctor($doctor_id){
            global $dbh;
            $query = "SELECT * FROM Doctor WHERE doctor_id = ".intval($doctor_id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
         function getDoctorByVisit($doctor_id){
            global $dbh;
            $query = "SELECT * FROM Doctor WHERE doctor_id = ".intval($doctor_id);
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
         function Search($searchQ){
            global $dbh;
            $query = "SELECT * FROM Doctor WHERE first_name LIKE '%$searchQ%' OR last_name LIKE '$searchQ' OR phone LIKE '$searchQ'";//.intval($first_name);
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        
        
    }
?>