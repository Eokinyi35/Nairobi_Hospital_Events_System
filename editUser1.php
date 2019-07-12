<?php
require_once "connection.php";
session_start();
    $ID = $_SESSION['assoc'];
    if (!isset($_SESSION["assoc"])) {
    header('Location: login.html');
}

$sql1 = "SELECT * FROM users";
$sql_result = mysqli_query($conn, $sql1); 

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
                <a class="navbar-brand page-scroll" href="admin.html">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                     <!-- <li>
                        <a class="page-scroll" href="dryfeed.php">donor Locations</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="dryfood.php">Dry foods</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="processedfeed.php">Processed foods</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="perishablefeed.php">Perishable foods</a>
                    </li> -->
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
                    <h2 class="section-heading">Edit Users</h2>
                    <h3 class="section-subheading text-muted">Make a difference.</h3>
                </div>
            </div>
            <div class="row">
             <form action="edit.php" method="POST" enctype="multipart/data">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="container">
                              <div class="row">
                                  <div class="col-lg-8 col-lg-offset-2">
                                      <div class="modal-body">
                                          <!-- Project Details Go Here -->

                                        
                                         <div class="portfolio-hover">
                                          <div class="portfolio-hover-content">
                                              <i class="fa fa-plus fa-3x"></i>
                                          </div>
                                         
                                         </div>

                                          <?php
 
                                          $servername = "localhost";
                                          $serveruser = "root";
                                          $serverpass = "";
                                          $dbname = "tnhevents";

                                          $conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

                                          
                                          //$ID = $_SESSION['assoc'];

                                          require_once "connection.php";
                                           $sql = mysqli_query($conn,"SELECT * FROM users");
                                          if(!empty($sql))
                                          {
                                            $row = mysqli_num_rows($sql);
                                            if($row > 0 ) {
                                              // output data of each row
                                                while($rew = $sql->fetch_assoc()) {
                                                  
                  

                                          ?>

                                          <form action="edit.php" method="POST" enctype="multipart/data">
                                          <div style="background-color: #f1f1f1 border-radius: 5px; padding: 16px;" align="center">
                                          <div hidden="">
                                          
                                          <div class="form-group">
                                          <input type="number" name="Payroll" value='<?php echo $rew[$ID];?>' readonly class="form-control">
                                          </div>
                                          <div class="form-group">
                                          <input type="text" name="Full name" value='<?php echo $rew["fullname"];?>' readonly class="form-control">
                                          </div>
                                          <div class="form-group">
                                          <input type="email" name="Email Address" value='<?php echo $rew["email"];?>' readonly class="form-control">
                                          </div>
                                          <div class="form-group">
                                          <input type="text" name="Department" value='<?php echo $rew["department"];?>' readonly class="form-control">
                                          </div>
                                          <div class="form-group">
                                          <input type="number" name="Phone" value='<?php echo $rew["phone"];?>' readonly class="form-control">
                                          </div>
                                         
                                         
                                          </div>
                                          
                                          </div>
                                          </form>
                                          <?php
                                            
                                                }
                                              }
                                            }
                                          ?>
                                    
                                          <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i><a href = 'admin.html'>Back</a></button>
                                      </div>
                                  </div>
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
                        <li><a href="https://twitter.com/okinyi_emmanuel"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/Emmanuel Okinyi/?pnref=lhc"><i class="fa fa-facebook"></i></a>
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

 <script src="js/agency.js"></script>


</body>
</html>