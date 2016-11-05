<?php 
    include 'db.php';
    
    class Visit {
        // get all visits
        function getVisit(){
            global $dbh;
            $query = 'SELECT * FROM Visit';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        // add visit
        function addVisit($patient_id, $doctor_id, $visit_date, $description, $time){
            global $dbh;
            $query = 'INSERT INTO Visit(patient_id, doctor_id, visit_date, description, time) VALUES';
            $query .= "('$patient_id', '$doctor_id', '$visit_date', '$description', '$time')";
            $dbh->exec($query);
        }
        
        //Delete visit
        function deleteVisit($visit_id){
            global $dbh;
            $query = "DELETE FROM Visit WHERE visit_id = '$visit_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        //delete visit by doctor's ID
        function deleteVisitByDoctorID($id){
            global $dbh;
            $query = "DELETE FROM Visit WHERE doctor_id = '$id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        //delete visit by patient's ID
        function deleteVisitByPatientID($id){
            global $dbh;
            $query = "DELETE FROM Visit WHERE patient_id = '$id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        
        // Edit visit
        function editVisit($visit_id, $doctor_id, $visit_date, $description, $time){
            global $dbh;
            $query = "UPDATE Visit
                    SET doctor_id = '$doctor_id', visit_date = '$visit_date', description = '$description', time = '$time'
                    WHERE visit_id = '$visit_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        //get one visit
        function getOneVisit($visit_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE visit_id = ".intval($visit_id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
        //Next coming visit for patient
        function getNextVisit($visit_date, $patient_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE visit_date >= '$visit_date' AND patient_id = '$patient_id' ORDER BY visit_date";//.intval($patient_id) ;
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
          
        }
        
        //Get Visit history for patient
        function getVisitsByPatient($patient_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE patient_id = '$patient_id' ORDER BY visit_date";//.intval($patient_id) ;
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
          
        }
        
         //Get last 10 programming languages 
        function getRecentVisitsByPatientID($patient_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE patient_id = '$patient_id' ORDER BY visit_date DESC, time LIMIT 10";//.intval($patient_id) ;
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
          
        }
        
        //Get all the visits for the day
        function getAllTodaysVisit($visit_date){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE visit_date = '$visit_date'"; //.intval($visit_date);
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
          
        }
        
         //Get visits history for doctor
        function getVisitsByDoctorID($doctor_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE doctor_id = '$doctor_id' ORDER BY visit_date";//.intval($patient_id) ;
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
          
        }
        
         //Get visits history for doctor
        function getRecentVisitsByDoctorID($doctor_id){
            global $dbh;
            $query = "SELECT * FROM Visit WHERE doctor_id = '$doctor_id' ORDER BY visit_date DESC, time LIMIT 20";//.intval($patient_id) ;
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
          
        }
        
        
    }
?>