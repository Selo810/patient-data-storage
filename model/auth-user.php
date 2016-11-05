<?php

namespace auth\user {
    require('db.php');    
    session_start();

    $salt = '!!! Adding this salt to your password hash will make it more secure, but may increase cholesterol !!!';
    
    // Login
    function login($username, $password) {
        global $dbh;
        global $salt;
        
        $query = "SELECT * FROM user WHERE username = '$username' AND type = 'auth'";
        
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
  
    function logout() {
        // Just end session
        session_destroy();
    }
    
}

?>