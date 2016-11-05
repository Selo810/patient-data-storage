<?php 
    include 'db.php';
    
    class Patient {
        // Works
        function getPatient(){
            global $dbh;
            $query = 'SELECT * FROM Patient';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addPatient($first_name, $middle_name, $last_name, $gender, $date_of_birth, $date_joined, $email, $phone){
            global $dbh;
                    
                   $address_id = $dbh->query('SELECT MAX(address_id) FROM Address')->fetch()['MAX(address_id)'];
                   $query = 'INSERT INTO Patient(address_id, first_name, middle_name, last_name, gender, date_of_birth, date_joined, email, phone) VALUES';
                   $query .= "($address_id, '$first_name', '$middle_name', '$last_name', '$gender', '$date_of_birth', '$date_joined', '$email', '$phone')";
                   $dbh->exec($query);
        }
        
        //work
        function deletePatient($patient_id){
            global $dbh;
            $query = "DELETE FROM Patient WHERE patient_id = '$patient_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        
        // Works
        function editPatient($patient_id, $first_name, $middle_name, $last_name, $gender, $date_of_birth, $email, $phone){
            global $dbh;
            $query = "UPDATE Patient
                    SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', 
                    gender = '$gender', date_of_birth = '$date_of_birth', email = '$email', phone = '$phone'
                    WHERE patient_id = '$patient_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        function getOnePatient($patient_id){
            global $dbh;
            $query = "SELECT * FROM Patient WHERE patient_id = ".intval($patient_id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
        function Search($searchQ){
            global $dbh;
            $query = "SELECT * FROM Patient WHERE first_name LIKE '%$searchQ%' OR last_name LIKE '$searchQ'  OR phone LIKE '$searchQ'";//.intval($first_name);
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
    }
?>