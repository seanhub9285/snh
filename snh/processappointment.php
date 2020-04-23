<?php session_start();


require_once('functions/appointment.php');


$errorCount = 0;



$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$date = $_POST['date'] != "" ? $_POST['date'] : $errorCount++;
$time = $_POST['time'] != "" ? $_POST['time'] : $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] : $errorCount++;
$complaint = $_POST['complaint'] != "" ? $_POST['complaint'] : $errorCount++;
$bookdepartment = $_POST['bookdepartment'] != "" ? $_POST['bookdepartment'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['nature_appoint'] = $nature;
$_SESSION['complaint'] = $complaint;
$_SESSION['bookdepartment'] = $bookdepartment;


$_SESSION['email'] = $email;
if($errorCount > 0){
    //display proper messages to the user

    $session_error = "You have " . $errorCount . "  error";

   
    if($errorCount > 1){
        $session_error .= "s";
    }  
    
    $session_error .= " in your submission";
    $_SESSION["error"] = $session_error;   
    header("Location: appointments.php");

    
} else {

    
    $newAppointmentId = $countAllAppointments-1;

    $appointmentObject = [
        'id' => $newAppointmentId,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'gender' => $gender,
        'nature' => $nature,
        'complaint' => $complaint,
        'bookdepartment' => $bookdepartment,
        'date'=>date("Y/m/d"),
        'time'=>date("h:i:sa")             
    ];

    
    //check if the user already exist
    $appointmentExists = find_appointment($email);

          if($appointmentExists){
            $_SESSION["error"] = "Booking Failed, Appointment already exist!";
            header("Location: appointments.php");
            die();
        }

  //save in the database
  save_appointment($appointmentObject); 

   $_SESSION["message"] = "Appointment successfully registered, The next Medical Staff will attend to you!" . $first_name;
   header("Location: appointments.php");

}

