<?php
// Start the session
session_start();
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
                <a class="navbar-brand page-scroll" href="index.php">Back</a>
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
                    <h2 class="section-heading">Campaigns</h2>
                    <h3 class="section-subheading text-muted">Easen up.</h3>
                </div>
            </div>
            <div class="row">
             <form action="process.php"  method="POST" enctype ="multipart/form-data">
               
                
                <div class="row">
                <table align="center" >
                                        
                                        <tr>
                                        
                                          <td class="col-md-6">
                                           
                                              <div class="well">
                                                
                                                <?php
 
                                          $servername = "localhost";
                                          $serveruser = "root";
                                          $serverpass = "";
                                          $dbname = "tnhevents";

                                          $conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

                                          
                                          //$ID = $_SESSION['assoc'];

                                          require_once "connection.php";
                                           $sql = mysqli_query($conn,"SELECT * FROM eventchoice WHERE eventtype = 'Campaigns'");
                                          if(!empty($sql))
                                          {
                                            $row = mysqli_num_rows($sql);
                                            if($row > 0 ) {
                                              echo "<table border='2' width='800'>";
                                              echo "<tr>";
                                              echo "<th>Event name</th>";
                                              echo "<th>First Date</th>";
                                              echo "<th>Second Date</th>";
                                              echo "<th>Registered attandees</th>";
                                              echo "<th>Details</th>";
                                              echo "</tr>";
                                                     echo "</thead>";
                                               echo "<tbody>";
                                              // output data of each row
                                                while($row = $sql->fetch_assoc()) {
                                                   $eventname = $row['eventname'];
$qry_campaigns="SELECT COUNT(*) as num FROM registered WHERE `eventname` = '$eventname'";
$total_campaigns = mysqli_fetch_array(mysqli_query($conn,$qry_campaigns));
$total_campaigns = $total_campaigns['num'];
                                                echo "<tr>";
                                                echo "<td>" . $row['eventname'] . "</td>";
                                                echo "<td>" . $row['firstdate'] . "</td>";
                                                echo "<td>" . $row['seconddate'] . "</td>";
                                                echo "<td>" . $total_campaigns . "</td>";
                                                echo "<td>" . '<a href=details.php?event_id=' . $row['eventId'] . '>Details</a> ' . "</td>";
                                                }
                                                echo "</table>";
                                              }else{
                                                echo "Table is empty";
                                              }
                                            }
                                          ?>
                                                </div>
                                            </form>
                                            <form method="post" action="exportcampaigns.php" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <button class="btn btn-info">Export</button>
                                                </div>

                                            </form>
                                          </td>  
                                        </tr>
                     </table>
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