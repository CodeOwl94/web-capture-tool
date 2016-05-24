<?php
session_start();
if(isset($_SESSION['user'])!="")
{
    header("Location: ../index.php");
}
include_once '../openDB.php';

if(isset($_POST['signup-btn']))
{
    //Pull the data from the form
    $first_name = mysqli_real_escape_string($link,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($link,$_POST['last_name']);
    $username = mysqli_real_escape_string($link,$_POST['uni_id']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $plain_pass = mysqli_real_escape_string($link,$_POST['password']);

    //Hash the password
    $hash_pass = password_hash($plain_pass, PASSWORD_BCRYPT);

    //Get rid of all white spaces
    $first_name = trim($first_name);
    $last_name = trim($last_name);
    $username = trim($username);
    $email = trim($email);
    $hash_pass = trim($hash_pass);
    
    // email exist or not
    $query = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($link,$query);
    
    $count = mysqli_num_rows($result); // if email not found then register
    
    if($count == 0){
        
        if(mysqli_query($link,"INSERT INTO users(uni_id, first_name, last_name, password, email ) VALUES('$username','$first_name','$last_name', '$hash_pass', '$email')"))
        {
            ?>
            <script>alert('Successfully Registered! ');</script>
            <?php
        }
        else
        {
            ?>
            <script>alert('Error while registering you...');</script>
            <?php
        }       
    }
    else{
            ?>
            <script>alert('Sorry Email ID already taken ...');</script>
            <?php
    }
    
}
?>

<!DOCTYPE html>
<html>
<body>
 <!--Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!--Begin navbar--> 
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" alt="Brand" src="../assets/logo.jpg">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!--Add class="active" to make the tab look selected. Removed for now so the left side of the menu has the same code across all our relevant files-->
                    <!-- sr-only has something to do with screen readers. It's to do with accessibility. I'll remove it for now. Bring it back later if needed. 
                    It goes in the content of the link. e.g. Data Capture Tool <span class="sr-only">(current)</span>-->
                    <li><a href="../">Data Capture Tool</a></li>
                    <li><a href="../DataTables/Example_2/">Experiment Database</a></li>
                    <li><a href="#">Register</a></li>

                </ul>

                <!--Now have the submit button on the right-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-btn" >

                            <a class="btn btn-danger" id="submit_nav" href="#signup">Sign Up</a>
                         </p>
                    </li>
                </ul>  

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--End navbar--> 

<!--Begin the registration form-->    
<div class="container">
        <form  method="post" enctype="multipart/form-data">

            <div class="page-header">
                <h1>Registration Form </h1> <!--use <small></small> to get smaller grey text-->
                <h4>Please fill out the form and then click the 'Submit Details' button <small>(* indicates a required field)</small></h4>
                
            </div>

            <div class="row">
                <!--Begin first name -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            First Name *
                        </div>
                        <div class="panel-body">
                            <input type="text" class ="col-md-6" rows="1" name="first_name" id="first_name" required></input>
                        </div>
                    </div>
                </div>
                <!--End first name-->

                <!--Begin last name -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Last Name *
                        </div>
                        <div class="panel-body">
                            <input type="text" class ="col-md-6" rows="1" name="last_name" id="last_name" required></input>
                        </div>
                    </div>
                </div>
                <!--End last name-->

            </div> 

            <div class="row">
                <!--Begin uni id -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            University ID *
                        </div>
                        <div class="panel-body">
                            <input type="number" class ="col-md-6" name="uni_id" id="uni_id" min="1"required>
                        </div>
                    </div>
                </div>
                <!--End uni id -->  

                <!--Begin email-->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Email *
                        </div>
                        <div class="panel-body">
                            <input type="email" class ="col-md-6" name="email" id="email" required>
                        </div>
                    </div>
                </div>
                <!--End email-->         
            </div>

            <div class="row">
                <!--Begin password -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Password *
                        </div>
                        <div class="panel-body">
                            <input type="password" class="col-md-6" name="password" id="password"></select>
                        </div>
                    </div>
                </div>
                <!--End password-->

                <!--Begin password check -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Confirm Password *
                        </div>
                        <div class="panel-body">
                            <input type="password" class="col-md-6" name="password_check" id="password_check"></select>
                        </div>
                    </div>
                </div>
                <!--End check-->           
            </div>           

            

<div class="row">
<button type="submit" name="signup-btn">Sign Me Up</button>
    
    
        <!--<button type="submit" name="signup-btn" id="signup" style="display: none"></button>-->
    
    

   
</div>




</form>
</div>

<!--js scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>   

<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="data_script.js"></script>





</body>
</html>