<?php include_once('lib/header.php');
 require_once('functions/alert.php');
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    //header("Location: login.php");
}

?>

<div class="container">
    <div class="row col-6">
        <h3>Book Appointments</h3>
    </div>
    <div class="row col-6">
        <p><strong>Welcome, Please Book Your Appointments</strong></p>
    </div>
    <div class="row col-6">
        <p>All Fields are required</p>
    </div>
    <div class="row col-6">

        <form method="POST" action="processappointment.php">
        <p>
            <?php  print_alert(); ?>
        </p>
        <p>
                <label>First Name</label><br />
                <input  
                <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name" />
            </p>
            <p>
                <label>Last Name</label><br />
                <input
                <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name"  />
            </p>
            <p>
                <label>Email</label><br />
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email"  />
            </p>
            <p>
                <label>Gender</label><br />
                <select class="form-control" name="gender" >
                <?php              
                    if(isset($_SESSION['department'])){
                        echo "value=" . $_SESSION['department'];                                                             
                    }                
                ?>
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Male</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Female</option>
                </select>
            </p>
            <p>
                <label>Time of Appointment</label><br />
                <input type="time" class="form-control" name="time" />
            </p>
            <p>
                <label>Date of Appointment</label><br />
                <input type="date" class="form-control" name="date" />
            </p>
            <p>
                <label>Nature of Appointment</label><br />
                <select class="form-control" name="nature" >
                    <option value="">Select One</option>
                    <option>Critical</option>
                    <option>Urgent</option>
                    <option>Normal</option>
                </select>
            </p>
        
            <p>
                <label>Initial Complaint</label><br />
                <select class="form-control" name="complaint" >
                
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['complaint']) && $_SESSION['complaint'] == 'I am sick'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >I am sick</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['complaint']) && $_SESSION['complaint'] == 'I am well'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >I am well</option>
                </select>
            </p>
            <p>
                <label class="label" for="bookdepartment">Booking Department</label><br />
                <input
                <?php              
                    if(isset($_SESSION['bookdepartment'])){
                        echo "value=" . $_SESSION['bookdepartment'];                                                             
                    }                
                ?>
                type="text" id="bookdepartment" class="form-control" name="bookdepartment" placeholder="Department"  />
            
            </p>
            <p>
                <button class="btn btn-sm btn-success" type="submit">Submit</button>
            </p>
        </form>

    </div>

</div>
<?php include_once('lib/footer.php'); ?>