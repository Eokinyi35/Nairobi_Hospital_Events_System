<?php
// Start the session
session_start();
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TNH Events</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

 <section id="contact">
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="body.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                     <li>
                        <a  class="page-scroll" href="logout.php">logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Register</h2>
                    <h3 class="section-subheading text-muted">Pick your date.</h3>
                </div>
            </div>
            <div class="row">
             <form id ="ContactForm" action="process.php?event_id=<?php echo $_GET['event_id'] ?>"  method="POST" enctype ="multipart/form-data">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <select name="eventdate" id="eventdate">
                                      <option>Prefered date</option>
                                        <?php

                                        $servername = "localhost";
                                          $serveruser = "root";
                                          $serverpass = "";
                                          $dbname = "tnhevents";

                                          $conn = new mysqli($servername, $serveruser, $serverpass, $dbname);
                                            
                                          
                                          //$ID = $_SESSION['assoc'];

                                          require_once "connection.php";

                                          $event_id = 0;
                                    if(isset($_GET['event_id'])){
                                        $event_id = $_GET['event_id'];

                                            $query1 = "SELECT * FROM eventchoice WHERE eventId = $event_id";
                                            $result1 = $conn->query($query1);
                                            if($result1->num_rows > 0){
                                                while($rows1 = $result1->fetch_assoc()){
                                                    $firstdate = $rows1['firstdate'];
                                                    $seconddate = $rows1['seconddate'];
                                        ?>
                                                <option><?php echo $firstdate; ?></option>
                                                <option><?php echo $seconddate; ?></option>
                                                
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="transportation" id="transportation">
                                        <option>Mode of transportation</option>
                                      <option value="Private">Private</option>
                                      <option value="Institution provision">Institution provision</option>
                                    </select>
                                    <a href="regdetails.php">Registered event details</a>
                                </div>
                                 
                            </div>
                            <div class="col-md-6">
                                <!-- <?php 
                                    $event_id = 0;
                                    if(isset($_GET['event_id'])){
                                        $event_id = $_GET['event_id'];
                                    }



                                ?> -->
                                <input type="hidden" id="eventId" value="<?php echo $event_id; ?>"></input>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" id="sub" name = "submit" class="btn btn-xl">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy;Eokinyi35 2018</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="https://twitter.com/thenairobihosp"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/The Nairobi Hospital/?pnref=lhc"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/eokinyi/"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script type="text/javascript" src="js/googlemaps.js"></script>
 <script src="js/agency.js"></script>
<!--<script src="js/submit.js"></script>-->

</body>
</html>