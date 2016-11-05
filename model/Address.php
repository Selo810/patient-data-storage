<?php 
    include 'db.php';
    
    class Address {
        // Works
        function getAddress(){
            global $dbh;
            $query = 'SELECT * FROM Address';
            $result = $dbh->query($query);
            $result = $result->fetchAll();
            return $result;
        }
        
        
        function addAddress($street, $city, $state, $zip){
            global $dbh;
                   $query = 'INSERT INTO Address(street, city, state, zip_code) VALUES';
                   $query .= "('$street', '$city', '$state', '$zip')";
                   $dbh->exec($query);
        }
        
        //work
        function deleteAddress($address_id){
            global $dbh;
            $query = "DELETE FROM Address WHERE address_id = '$address_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        //work
        function deleteAddressByPatientID($id){
            global $dbh;
            $query = "DELETE FROM Address WHERE address_id = '$id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        
        // Works
        function editAddress($address_id, $street, $city, $state, $zip){
            global $dbh;
            $query = "UPDATE Address 
                    SET street = '$street', city= '$city', state = '$state', zip_code = '$zip'
                    WHERE address_id = '$address_id'";
            $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
        }
        
        function getOneAddress($Address_id){
            global $dbh;
            $query = "SELECT * FROM Address WHERE Address_id = ".intval($Address_id);
            $result = $dbh->query($query);
            $result = $result->fetch();
            return $result;
        }
        
        
        
    }
?>