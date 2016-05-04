<?php
session_start();
include_once '../openDB.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: ../index.php");
}

if(isset($_POST['login-btn']))
{
	//Pull the data from the form
    $username = mysqli_real_escape_string($link,$_POST['uni_id']);
    $plain_pass = mysqli_real_escape_string($link,$_POST['password']);
	
	//Get rid of all white spaces
    $username = trim($username);
    $plain_pass = trim($plain_pass);
	
	$res=mysqli_query($link,"SELECT uni_id, password FROM users WHERE uni_id='$username'");
	$row=mysqli_fetch_array($res);
	
	$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
		
	if ($count==1) {

		$hash = $row['password'];

		if(password_verify($plain_pass,$hash))
		{
			$_SESSION['user'] = $username;
			header("Location: ../index.php");
		}
		else
		{
			?>
	        <script>alert('Username / Password Seems Wrong !');</script>
	        <?php
		}
	}

	else{
		?>
	        <script>alert('Username is not registered. Please go to registration page.');</script>
	        <?php
	        //header("Location: register.php");
	}

	
}
?><!DOCTYPE html>
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
                    <li><a href="../">Data Capture Tool</a></li>
                    <li><a href="../DataTables/Example_2">Experiment Database</a></li>
                    <li><a href="register.php">Register</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--End navbar--> 

<!--Begin the registration form-->    
<div class="container">
        <form  method="post" enctype="multipart/form-data">

            <div class="page-header">
                <h1>Login Form </h1> <!--use <small></small> to get smaller grey text-->
                <h4>Please fill out the form and then click the 'Login' button <small>(* indicates a required field)</small></h4>
                
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

<div class="row">
<button type="submit" name="login-btn">Log In</button>
    <!--Begin submit button -->
    <div class="col-md-3">
        <button class="btn btn-primary col-md-12" type="submit" name="submit" value="submit_end" id="submit_end" style="display: none">Submit Details</button>
    </div>
    <!--End submit button-->

   
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