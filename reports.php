<?php
session_start();
error_reporting(0);

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "tnhevents";
// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

    ?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>TNH Events | Admin Dashboard</title>

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	
	<link rel="stylesheet" href="css/bootstrap-social.css">
	
	<link rel="stylesheet" href="css/bootstrap-select.css">
	
	<link rel="stylesheet" href="css/fileinput.min.css">
	
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$qry_parties="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'party'";
$total_parties = mysqli_fetch_array(mysqli_query($conn,$qry_parties));
$total_parties = $total_parties['num'];
?>
													<div class="stat-panel-number h1 "><?php echo $total_parties;?></div>
													<div class="stat-panel-title text-uppercase">Parties</div>
												</div>
											</div>
											<a href="parties.php" class="block-anchor panel-footer">Full Details <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$qry_sports="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'sports'";
$total_sports = mysqli_fetch_array(mysqli_query($conn,$qry_sports));
$total_sports = $total_sports['num'];
?>
													<div class="stat-panel-number h1 "><?php echo $total_sports;?></div>
													<div class="stat-panel-title text-uppercase">Sports</div>
												</div>
											</div>
											<a href="sports.php" class="block-anchor panel-footer text-center">Full Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$qry_campaigns="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'campaigns'";
$total_campaigns = mysqli_fetch_array(mysqli_query($conn,$qry_campaigns));
$total_campaigns = $total_campaigns['num'];
?>
													<div class="stat-panel-number h1 "><?php echo $total_campaigns;?></div>
													<div class="stat-panel-title text-uppercase">Campaigns</div>
												</div>
											</div>
											<a href="campaigns.php" class="block-anchor panel-footer text-center">Full Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
								</div>
								<div>
									
									<div class="col-md-3">
										<?php 
$qry_party="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'party'";
$total_party = mysqli_fetch_array(mysqli_query($conn,$qry_party));
$total_party = $total_party['num'];
?>
<?php 
$qry_sport="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'sports'";
$total_sport= mysqli_fetch_array(mysqli_query($conn,$qry_sport));
$total_sport = $total_sport['num'];
?>
<?php 
$qry_camp="SELECT COUNT(*) as num FROM eventchoice WHERE eventtype = 'campaigns'";
$total_camp= mysqli_fetch_array(mysqli_query($conn,$qry_camp));
$total_camp = $total_camp['num'];
?>
<div id="piechart"></div>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
		var parties= <?php echo $total_party; ?>;
		var sports= <?php echo $total_sport; ?>;
		var campaigns= <?php echo $total_camp; ?>;
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
 ['Parties', parties],
  ['Sports', sports],
  ['campaigns', campaigns]
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Events', 'width':550, 'height':400, 'is3D':'true'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>