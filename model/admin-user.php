<?php

namespace admin\user {
    require('db.php');    
    session_start();
    // CRYPTO: http://php.net/manual/en/intro.password.php

    //$db = \db\connect\get_pdo();
    $salt = '!!! Adding this salt to your password hash will make it more secure, but may increase cholesterol !!!';
    
    // Login
    function login($username, $password) {
        global $dbh;
        global $salt;
        
        $query = "SELECT * FROM user WHERE username = '$username' AND type = 'admin'";
        
        $user = $dbh->query($query);
        $user = $user->fetch();
        
        $hash = $user['password'];
        
        if (password_verify($password, $hash)) {
            session_start();
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }
    }
    
    // Register
    function register($username, $password, $type) {
        // PDO 
        global $dbh;
        // Salt
        global $salt;
        
        // Hash input
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //echo $hash;
        //Salt hash
        //$hash .= $salt;
        
        // Build Query
        $query = "INSERT IGNORE INTO user SET username = '$username', password = '$hash', type = '$type'";

        // Execute
        $rslt = $dbh->exec($query);
        
        
        
        //Error checking
        if ($rslt == 0) {
            return false;
        } else {
            $_SESSION['username'] = $username;
            return true;
        }
    }
    
    function logout() {
        // Just end session
        session_destroy();
    }
    
    function change_password($username, $password) {
        // PDO
        global $dbh;
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET password = '$hash'";
        $query .= "WHERE username = '$username'";
        
        
        $dbh->exec($query) or die(print_r($dbh->errorInfo(), true));
    }
}

?>