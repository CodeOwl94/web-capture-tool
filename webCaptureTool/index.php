<?php
session_start();

$loggedIn = 0;

if(isset($_SESSION['user']))
{
    $loggedIn = 1;
}

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!--Clockpicker-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/github.min.css">

    <!-- My custom edits -->
    <link rel="stylesheet" type="text/css" href="assets/custom.css">

    <title>Data Entry Portal</title>

    

</head>



<body>

    <!--Begin navbar--> 
    <nav class="navbar navbar-default navbar-fixed-top"  >
        <div class="container-fluid" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" alt="Brand" src="assets/logo.jpg">
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!--Add class="active" to make the tab look selected. Removed for now so the left side of the menu has the same code across all our relevant files-->
                    <!-- sr-only has something to do with screen readers. It's to do with accessibility. I'll remove it for now. Bring it back later if needed. 
                    It goes in the content of the link. e.g. Data Capture Tool <span class="sr-only">(current)</span>-->
                    <!--<li><a href="http://localhost:90/Git/web-capture-tool/webcapturetool/">Data Capture Tool</a></li>
                    <li><a href="http://localhost:90/Git/web-capture-tool/webcapturetool/DataTables/Example_2/">Experiment Database</a></li>
                    <li><a href="http://localhost:90/Git/web-capture-tool/webcapturetool/users/register.php">Register</a></li>-->
                    
                    <li><a href="#">Data Capture Tool</a></li>
                    <li><a href="./DataTables/Example_2/">Experiment Database</a></li>
                    <li><a href="./users/register.php">Register</a></li>

                </ul>
                <!--Now have the submit button on the right-->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-btn" >

                            <!--Check if the user is logged in. If they are, we show them the submit button. Otherwise, it's the login button. -->
                            <?php if($loggedIn):?>
                            <a class="btn btn-danger" id="logout_btn" href="./users/logout.php?logout">Log Out</a>
                            <a class="btn btn-info" id="submit_nav">Submit Details</a>

                            <?php else: ?>
                            <a class="btn btn-danger" id="login_btn" href="users/login.php">Log In To Submit</a>                            

                            <?php endif;?>

                        </p>
                    </li>
                </ul>   
            </div>
            <!-- /.navbar-collapse -->

            <div class="container">

            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <!--End navbar--> 

    <div class="container" >

        <!-- You only need this form and the form-basic.css -->

        <form  method="post" action="submit_form.php" enctype="multipart/form-data">

            <div class="page-header">
                <h1>Experiment Details </h1> <!--use <small></small> to get smaller grey text-->
                <h4>Please fill out the form and then click the 'Submit Details' button <small>(* indicates a required field)</small></h4>
                
            </div>

            <div class="row">
                <!--Begin name -->
                <div class="col-md-3">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Name *
                        </div>
                        <div class="panel-body">
                            <select class="col-md-12" name="first_name" id="first_name"></select>
                        </div>
                    </div>
                </div>
                <!--End name-->

            </div>        

            <div class="row">
                <!--Begin start time -->
                <div class="col-md-6">
                 <div class="panel panel-primary ">
                    <div class="panel-heading">
                        Start time *
                    </div>
                    <div class="panel-body">
                        <input type="date" name="start_date" id="start_date" required>
                        <!--<input type="time" name="start_time" id="start_time" required>-->

                        <div class="input-group clockpicker col-md-4" data-placement="right" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" value="00:00" id="start_time" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                    </div>
                    

                </div>
            </div>
            <!--End start time -->

            <!--Begin end time -->
            <div class="col-md-6">
             <div class="panel panel-primary ">
                <div class="panel-heading">
                    End time *
                </div>
                <div class="panel-body">
                    <input type="date" name="end_date" id="end_date" required>
                    <!--<input type="time" name="end_time" id="end_time" required>-->
                    <div class="input-group clockpicker col-md-4" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" value="00:00" id="end_time" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--End end time -->
    </div>

    <div class="row">

        <!--Begin motor number -->
        <div class="col-md-3">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    Motor Number *
                </div>
                <div class="panel-body">
                    <input type="number" name="motor" id="motor" min="1" step="1" required>
                </div>
            </div>
        </div>
        <!--End motor number -->

        <!--Begin tyre ring set number -->
        <div class="col-md-3">
         <div class="panel panel-primary ">
            <div class="panel-heading">
                Tyre Ring Set Number *
            </div>
            <div class="panel-body">
                <input type="number" name="tyre_ring" id="tyre_ring" min="1" step="1" required>
            </div>
        </div>
    </div>
    <!--End tyre ring set number -->

    <!--Begin drive pulley number -->
    <div class="col-md-3">
     <div class="panel panel-primary ">
        <div class="panel-heading">
            Drive Pulley Number *
        </div>
        <div class="panel-body">
            <input type="number" name="drive_pulley" id="drive_pulley" min="1" step="1" required>
        </div>
    </div>
</div>
<!--End drive pulley number -->

<!--Begin drive belt number -->
<div class="col-md-3">
 <div class="panel panel-primary ">
    <div class="panel-heading">
        Drive Belt Number *
    </div>
    <div class="panel-body">
        <input type="number" name="drive_belt" id="drive_belt" min="1" step="1" required>
    </div>
</div>
</div>
<!--End drive belt number -->
</div>

<div class="row">
    <!--Begin comments -->
    <div class="col-md-12">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                Comments 
            </div>
            <div class="panel-body">
                <textarea class ="col-md-12" rows="5" name="comments" id="comments"></textarea>
            </div>
        </div>
    </div>
    <!--End comments -->
</div>

<div class="row">
    <!--Begin comments -->
    <div class="col-md-3">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                Upload File *
            </div>
            <div class="panel-body">
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
        </div>
    </div>
    <!--End comments -->
</div>

<div class="row">

    <!--Begin submit button -->
    <div class="col-md-3">
        <button class="btn btn-primary col-md-12" type="submit" name="submit" value="submit_end" id="submit_end" style="display: none">Submit Details</button>
    </div>
    <!--End submit button-->

   
</div>




</form>

</div>

<div class="navbar navbar-default navbar-fixed-bottom" >
    <div class="container">
        <p class="navbar-text pull-left">
            Obtain the <a href="https://github.com/CodeOwl94/web-capture-tool">source code</a> for this site and view the <a href="https://github.com/CodeOwl94/web-capture-tool/blob/master/CHANGELOG.md">changelog</a>.
        </p>
    </div>
</div>


<!--js scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!--Clockpicker-->
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>

<script src="scripts/script.js"></script>

</body>



</html>
