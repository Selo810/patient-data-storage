<?php
  // Begin session
    session_start();
    require './model/Address.php';
    require './model/Doctor.php';
    require './model/Patient.php';
    require './model/Visit.php';

 // Set action for incoming requests (no curly braces for optomization)
    if ( isset($_GET['action']) ) $action = $_GET['action']; 
    else if( isset($_POST['action']) ) $action = $_POST['action'];
    include 'view/header.php';
    include './model/auth-user.php';

    $Address = new Address();
    $Doctor = new Doctor();
    $Patient = new Patient();
    $Visit = new Visit();
    
     // Check if the user is logged in or trying to login
    if (!isset($_SESSION['username']) && $action != 'login') {
        include('view/login.php');
        //\auth\user\register('los810', 'password');
        die();
    }
    
    switch($action){
        
        // Auth
        case 'login':
            if(\auth\user\login($_POST['username'], $_POST['password'])) {
                 // Views
                
        
            include 'view/main.php';
            } else {
                $error = 'Incorrect username or password';
                include 'view/login.php';
            }
            break;
            
        case 'logout': 
            \auth\user\logout();
            include 'view/login.php';
            break;
        
/*-----------------------------------ADD FORMS------------------------------------*/
/*-----------------------------------------------------------------------------------*/
        case 'add-forms':
             switch ($_GET['type']) {
                case 'patient':
                    $type = 'patient';
                    include 'view/Patient/patient-add.php';
                    break;
                    
                case 'visit':
                    $type = 'visit';
                    $Patient = $Patient->getOnePatient($_GET['id']);
                    $Doctor = $Doctor->getDoctor();
                    include 'view/Visit/visit-add.php';
                    break;
                
                case 'doctor':
                    $type = 'doctor';
                
                    include 'view/Doctor/doctor-add.php';
                    break;
            }
            
            break;
            
/*-----------------------------------EDIT FORMS------------------------------------*/
/*-----------------------------------------------------------------------------------*/
        case 'edit-forms':
             switch ($_GET['type']) {
                case 'patient':
                    $type = 'patient';
                    $Patient = $Patient->getOnePatient($_GET['id']);
                    $Address = $Address->getOneAddress($Patient['address_id']);
                    include 'view/Patient/patient-edit.php';
                    break;
                    
                 case 'patient-address':
                    $type = 'patient-address';

                    $Address = $Address->getOneAddress($_GET['id']);
                    include 'view/Patient/patient-edit-addre.php';
                    break;    
                case 'visit':
                    $type = 'visit';
                    
                    //$Patient = $Patient->getOnePatient($_GET['id']);
                    $Visit = $Visit->getOneVisit($_GET['id']);
                    $Doctor = $Doctor->getDoctor();
                    include 'view/Visit/visit-edit.php';
                    break;
                    
                case 'doctor':
                    $type = 'doctor';
                    $Doctor = $Doctor->getOneDoctor($_GET['id']);
                    
                    include 'view/Doctor/doctor-edit.php';
                    break;
            }
            
            break;
            
            
/*-----------------------------------SEARCH FORMS------------------------------------*/
/*-----------------------------------------------------------------------------------*/
        case 'search-forms':
             switch ($_GET['type']) {
                case 'patient':
                    $type = 'patient';
                    include 'view/Patient/search.php';
                    break;
                    
                case 'doctor':
                    $type = 'doctor';
                    include 'view/Doctor/search.php';
                    break;
            }
            
            break;
            
/*-----------------------------------DETAIL PAGES------------------------------------*/
/*-----------------------------------------------------------------------------------*/
        case 'search-details':
             switch ($_GET['type']) {
                case 'patient':
                    $type = 'patient';
                    $current_date = date("Y-m-d"); 
                    
                    $Patient = $Patient->getOnePatient($_GET['id']);
                    $Address = $Address->getOneAddress($Patient['address_id']);
                    //$Visit = $Visit->getNextVisit($current_date, $Patient['patient_id']);
                    //$Doctor = $Doctor->getOneDoctor($Visit['doctor_id']);
                    include 'view/Patient/details.php';
                    break;
                    
                case 'doctor':
                    $type = 'doctor';
                    $current_date = date("Y-m-d"); 
                    
                    $Doctor = $Doctor->getOneDoctor($_GET['id']);
                    $Address = $Address->getOneAddress($Doctor['address_id']);
                    //$Visit = $Visit->getTodaysVisit($current_date, $Doctor['doctor_id']);
                    //$Doctor = $Doctor->getOneDoctor($Visit['doctor_id']);
                    include 'view/Doctor/details.php';
                    break;
            }
            
            break;
            
/*-----------------------------------ALL VISIT PAGES------------------------------------*/
/*-----------------------------------------------------------------------------------*/
        case 'view-visits':
             switch ($_GET['type']) {
                case 'patient':
                    $type = 'patient';
                   
                    $Patient = $Patient->getOnePatient($_GET['id']);
                    $Visits = $Visit->getVisitsByPatient($Patient['patient_id']);
                    
                    if($Visits){
                        
                        include 'view/Patient/visit-history.php';
                    }else{
                        $err = '<div class="tall">';
                        $err .= '<h3 class="red-text">SORRY</h3><p>There is not any visit scheduled for this patient</p>';
                        $err .= '</div>';
                        echo $err;
                    }
                    
                    break;
                    
                case 'recent-patient-visits':
                    $type = 'recent-patient-visits';
                    $Patient = $Patient->getOnePatient($_GET['id']);
                    $Visits = $Visit->getRecentVisitsByPatientID($Patient['patient_id']);
                    
                    if($Visits){
                        
                        include 'view/Patient/recent-visits.php';
                    }else{
                        $err = '<div class="tall">';
                        $err .= '<h3 class="red-text">SORRY</h3><p>There is not any visit scheduled for this patient</p>';
                        $err .= '</div>';
                        echo $err;
                    }
                    
                    
                    break;
                    
                case 'doctor':
                    $type = 'doctor';
                   
                    $Doctor = $Doctor->getOneDoctor($_GET['id']);
                    $Visits = $Visit->getVisitsByDoctorID($Doctor['doctor_id']);
                    
                    //check if there is a visit for doctor
                     if($Visits){
                        
                        include 'view/Doctor/visit-history.php';
                    }else{
                        $err = '<div class="tall">';
                        $err .= '<h3 class="red-text">SORRY</h3><p>There is not any visit scheduled for this doctor</p>';
                        $err .= '</div>';
                        echo $err;
                    }
                    
                    break;
                    
                case 'recent-doctor-visits':
                    $type = 'recent-doctor-visits';
                    $Doctor = $Doctor->getOneDoctor($_GET['id']);
                    $Visits = $Visit->getRecentVisitsByDoctorID($Doctor['doctor_id']);
                    
                    //check if doctor have recent visits
                    if($Visits){
                        
                        include 'view/Doctor/recent-visits.php';
                    }else{
                        $err = '<div class="tall">';
                        $err .= '<h3 class="red-text">SORRY</h3><p>There is not any visit scheduled for this doctor</p>';
                        $err .= '</div>';
                        echo $err;
                    }
                    
                    
                    break;
                    
                case 'visit':
                    $type = 'visit';
                    // get all the visit 
                    $Visit = $Visit->getVisit();
                    include 'view/Visit/visit-history.php';
                    break;
                    
                case 'visit-today':
                    $type = 'visit-today';
                    $current_date = date('Y-m-d');
                    
                    $Visits = $Visit->getAllTodaysVisit($current_date);
                    
                    // Check if there are visits for the day
                    if ($Visits){
                        include 'view/Visit/visit-today.php';
                    }else{
                        
                        $err = '<div class="tall">';
                        $err .= '<h3 class="red-text">SORRY</h3><p>There is not any visit scheduled for today</p>';
                        $err .= '</div>';
                        echo $err;
                        
                    }
                    
                    break;
            }
            
            break;
            
/*-----------------------------------PATIENT-----------------------------------*/
/*-----------------------------------------------------------------------------*/
        case 'add-patient':
            
            //if(isset($_POST['street']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip']) && isset($_POST['first_name'])
           /// && isset($_POST['middle_name']) && isset($_POST['last_name']) && isset($_POST['gender']) && isset($_POST['date_of_birth']) && isset($_POST['email']) && isset($_POST['phone']))
          //  {
            //Address Input
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            
            //Patient Input
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date_joined = date("Y-m-d");  
            
            //filter email
            filter_var($email, FILTER_SANITIZE_EMAIL);
            
            //validate users input
            if (empty($street) || empty($city) || empty($state) || empty($zip) || empty($first_name) || empty($last_name) || empty($gender) || empty($date_of_birth) || empty($email) || empty($phone)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
                include 'view/Patient/patient-add.php';
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $err = "view/Please enter a valid email.";
                
                echo $err;
                include 'view/Patient/patient-add.php';
            }else{
            
                $Address->addAddress($street, $city, $state, $zip);
                
                $add = $Patient->addPatient($first_name, $middle_name, $last_name, $gender, $date_of_birth, $date_joined, $email, $phone);
                $err = '<div class="tall">';
                $err .= '<p>Patient was successfully Added</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
   // }
            break;
            
        case 'edit-patient':
            //Patient Input
            $patient_id = $_SESSION["patient_id"];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
        
             if (empty($first_name) || empty($last_name) || empty($gender) || empty($date_of_birth) || empty($email) || empty($phone)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $err = "Please enter a valid email.";
                
                echo $err;
            }else{
            
                $Patient->editPatient($patient_id, $first_name, $middle_name, $last_name, $gender, $date_of_birth, $email, $phone);
                
                $err = '<div class="tall">';
                $err .= '<p>Patient information was successfully edited</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
           
           
            break;
    
        case 'edit-patient-address':
            //Address Input
            $address_id = $_SESSION["address_id"];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            
             if (empty($street) || empty($city) || empty($state) || empty($zip)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
            }else{
            
                $Address->editAddress($address_id, $street, $city, $state, $zip);
                
                $err = '<div class="tall">';
                $err .= '<p>Patient address information was successfully edited</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
           
            break;
            
            
        case 'search-patient':
            $searchQ = $_POST['search'];
            //$last_name = $_POST['last_name'];
            
            $result = $Patient->Search($searchQ);
            
            if($result){
                
                include 'view/Patient/search.php';
                include 'view/Patient/search-result.php';
                
            }else{
                include 'view/Patient/search.php';
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>There is no patient with that name</p>';
                $err .= '</div>';
                echo $err;
                
            }
            
            break;
            
        case 'delete_patient':
            $id = $_POST['patient_id'];	
            
            $Visits = $Visit->getVisitsByPatient($id);
            if($Visits){
                $Visit->deleteVisitByPatientID($id);
                $Patient->deletePatient($id);
                
                $err = '<div class="tall">';
                $err .= '<p>Patient was successfully removed</p> <a href="."><button  class="btn btn-primary blue-grey darken-4">Done</button></a>';
                $err .= '</div>';
                echo $err;
                
            }elseif(!$Visits){
                $Patient->deletePatient($id);
                $err = '<div class="tall">';
                $err .= '<p>Patient was successfully removed</p> <a href="."><button  class="btn btn-primary blue-grey darken-4">Done</button></a>';
                $err .= '</div>';
                echo $err;
            }else{
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>Something went wrong</p>';
                $err .= '</div>';
                echo $err;
            }
           
            break;
/*-----------------------------------VISITS------------------------------------*/
/*-----------------------------------------------------------------------------*/
        case 'add-visit':
            $id = $_SESSION["patient_id"];
            $doctor = $_POST['doctor_id'];
            $visit_date = $_POST['visit_date'];
            $description = $_POST['description'];
            $time = $_POST['visit_time'];
            
            
             if (empty($visit_date) || empty($description) || empty($time)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
            }else{
            
            $Visit->addVisit($id, $doctor, $visit_date, $description, $time);
            $err = '<div class="tall">';
                $err .= '<p>Visit was successfully Added</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
            
            break;
        
        case 'edit-visit':
            $id = $_SESSION["visit_id"];
            $doctor_id = $_SESSION["doctor_id"];
            $visit_date = $_POST['visit_date'];
            $description = $_POST['description'];
            $time = $_POST['visit_time'];
            
            if (empty($visit_date) || empty($description) || empty($time)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
            }else{
            
                $Visit->editVisit($id, $doctor_id, $visit_date, $description, $time);
                $feedback = '<div class="tall">';
                $feedback .= '<p>Visit was successfully edited</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $feedback .= '</div>';
                echo $feedback;
            }
            
            break;
        
        case 'delete_visit':
            $id = $_POST['visit_id'];	
            
            $Visit->deleteVisit($id);
            
            //redirect to Privious page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
            break;

/*-----------------------------------DOCTOR------------------------------------*/
/*-----------------------------------------------------------------------------*/
        case 'add-doctor':
            //Address Input
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
                
            //Doctor Input
            $center_id = $_POST['medical_center_id'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            
            //filter email
            filter_var($email, FILTER_SANITIZE_EMAIL);
            
            
            if (empty($street) || empty($city) || empty($state) || empty($zip) || empty($first_name) || empty($last_name) || empty($email) || empty($phone)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required</p>';
                $err .= '</div>';
                echo $err;
                include 'view/Doctor/doctor-add.php';
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $err = "Please enter a valid email.";
                
                echo $err;
                include 'view/Doctor/doctor-add.php';
            }else{
            
            $Address->addAddress($street, $city, $state, $zip);
            //$Center->getMedicalCenter();
                    
            $Doctor->addDoctor($first_name, $middle_name, $last_name, $phone, $email);
            $err = '<div class="tall">';
                $err .= '<p>Doctor was successfully Added</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
             
            
            break;
            
             
        case 'edit-doctor':
               
            //Doctor Input
            $doctor_id =  $_SESSION["doctor_id"];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            
            
            
             //filter email
            filter_var($email, FILTER_SANITIZE_EMAIL);
            
            
            if (empty($first_name) || empty($last_name) || empty($email) || empty($phone)){
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>All the fields are required *</p>';
                $err .= '</div>';
                echo $err;
            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $err = '<p class="red-text">Please enter a valid email.</p>';
                
                echo $err;
            }else{
            
                $Doctor->editDoctor($doctor_id, $first_name, $middle_name, $last_name, $phone, $email);
                $err = '<div class="tall">';
                $err .= '<p>Information was successfully edited</p> <button class="btn btn-primary blue-grey darken-4" onclick="goBack()">Done</button>

                <script>
                function goBack() {
                    window.history.go(-2);
                }
                </script>';
                $err .= '</div>';
                echo $err;
            }
            
                    
            
            break;
            
         case 'search-doctor':
            $searchQ = $_POST['search'];
            //$last_name = $_POST['last_name'];
            
            $result = $Doctor->Search($searchQ);
            
             if($result){
            
                include 'view/Doctor/search.php';
                include 'view/Doctor/search-result.php';
                
            }else{
                include 'view/Doctor/search.php';
                
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>There is no doctor with that name</p>';
                $err .= '</div>';
                echo $err;
                
            }
            
            break;
            
        case 'delete_doctor':
            $id = $_POST['doctor_id'];
            
            $Visits = $Visit->getVisitsByDoctorID($id);
            
            
             if($Visits){
                $Visit = $Visit->deleteVisitByDoctorID($id);
                
                
                $err = '<div class="tall">';
                $err .= '<p>Doctor was successfully removed</p> <a href="."><button  class="btn btn-primary blue-grey darken-4">Done</button></a>';
                $err .= '</div>';
                echo $err;
                
            }elseif(!$Visits){
                $Doctor->deleteDoctor($id);
                $err = '<div class="tall">';
                $err .= '<p>Doctor was successfully removed</p> <a href="."><button  class="btn btn-primary blue-grey darken-4">Done</button></a>';
                $err .= '</div>';
                echo $err;
            }else{
                $err = '<div class="tall">';
                $err .= '<h3 class="red-text">SORRY</h3><p>Something went wrong</p>';
                $err .= '</div>';
                echo $err;
            }
            break;
        default:
                    
            //include 'Patient/patient-add.php';
            include 'view/main.php';
            break;
                    
            
    }
    include 'view/footer.php';
   // $Doctor->getOneAddress(1);


?>