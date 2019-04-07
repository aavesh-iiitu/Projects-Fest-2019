<?php

// code to print out the temperature database in tabular form

$con=mysqli_connect('localhost','root','','templog');
  
$query="SELECT * FROM `temp-at-interrupt` ORDER BY `Date` DESC, `Time` DESC;"; 
$result=mysqli_query($con,$query);

?>
<html>
   <head>
   <meta http-equiv="refresh" content="5"/>
      <title>Sensor Data</title>
	   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	   <style type="text/css">
      #chart-container {
        width: 640px;
        height: auto;
		  
      }
    </style>
   </head>
<body style="background-color:beige">
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">H M S</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#home">Table Data</a></li>
       
        
        <li><a href="#chart-container">Graph Data</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	
	
	
	
	
	
	<div  id="home">
		<h1 style="margin-top: 50px" align="center">Welcome To IOT Based Health Monitoring System for Comatose Patients</h1>
   <h2 style="margin-top: 50px" align="center">Realtime Health Updates</h2>
	

   <table border="1" cellspacing="1" cellpadding="1" align="center">
		<tr>
			<td>&nbsp;Date&nbsp;</td>
			<td>&nbsp;Time&nbsp;</td>
			<td>&nbsp;Temperature&nbsp;</td>
			<td>&nbsp;Status&nbsp;</td>
			<td>&nbsp;Heart Rate&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysqli_fetch_assoc($result)) { 
			 
			 if($row["Status"]=="0"){
				 $current="No Motion Detected";
			 }
			 else{
				 $current="Motion Detected";
			 }
			 
			 
			 
			 if($row["Heart_Rate"]=="0"){
				 $heartbeat="no heart beat found";
			 }
			 else{
				 $heartbeat="BPM".$row["Heart_Rate"];
			 }
			 
			 
				 
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["Date"], $row["Time"], $row["Temperature"],$current,$heartbeat);
				 
				
		     }
		     mysqli_free_result($result);
		     
		  }
	   
	?>

   </table>
	</div>
	
	<div id="chart-container">
		<h3 align="center"> Temperature Graph</h3>
      <canvas id="mycanvas"></canvas><br><br>
		<h3 align="center">Heart Rate Graph</h3><br><br>
		<canvas id="mycanvas1"></canvas>
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="chart/app.js"></script>
	<script type="text/javascript" src="chart/app1.js"></script>
	
</body>
</html>
