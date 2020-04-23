<?php include_once('alert.php');


function is_user_loggedIn(){

    if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])) {
        return true;
    }

    return false;
}

function find_appointment($email = ""){
   //check the database if the user exist 
    if(!$email){
        set_alert('error', 'Your Email is not set'); 
        die();
    }
   $allAppointments = scandir("db/appointments/");    
   $countAllAppointments = count($allAppointments);
   
   $empty = "";

   for($counter = 0; $counter < $countAllAppointments; $counter++){

    $currentAppointment = $allAppointments[$counter];

    if($currentAppointment == $email . ".json"){
    //check for your password
     $appointmentString = file_get_contents("db/appointments/" . $currentAppointment);
     $appointmentObject = json_decode($appointmentString);
    
     return $appointmentObject;
   
    }
  }
  
}

function save_appointment($appointmentObject){
    file_put_contents("db/appointments/" . $appointmentObject['email'] . ".json", json_encode($appointmentObject));
}