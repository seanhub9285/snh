<?php include_once("lib/medical_header.php"); require_once('functions/alert.php');


if(!isset($_SESSION['loggedIn'])){
    header("Location:login.php");
}
?>



<h3> Medical Team DashBoard </h3>
    <p>Welcome, <?php echo $_SESSION['fullname']?>. You are logged in as (<?php echo $_SESSION['role']?>).
    Your account was created on <?php echo $_SESSION['date']?> by <?php echo $_SESSION['time']?>.
    <!--and your ID is <?php echo $_SESSION['loggedIn']?>-->
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

