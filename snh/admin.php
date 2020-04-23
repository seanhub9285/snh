<?php include_once('lib/medical_header.php'); 


if(!isset($_SESSION['loggedIn'])){
    header("Location:login.php");
}
?>



<h3> Super Admin DashBoard </h3>
    <p>Welcome,  You are logged in as 
    Your account was created on  by 
    <!--and your ID is 
    </p>

    <p>
    Last Login:
    <?php
    $email = $_SESSION['email'];
    $alldate = scandir("date/");
    $countAllUsers = count($alldate);
    for ($counter = 0; $counter < $countAllUsers; $counter++ ){
      $currentdate = $alldate[$counter];
      if($currentdate == ".json"){
        $userString = file_get_contents("date/". $currentdate);
        $userdate = json_decode($userString);
        $_SESSION ["lastLogin"] = $userdate -> lastLogin;
        echo $_SESSION["lastLogin"];
          die();
        }
    }
    ?>
    </p>

