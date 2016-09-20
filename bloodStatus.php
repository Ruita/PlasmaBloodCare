<html>
<head>
  <title>Blood Group Search</title>
  
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/redmond/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" href="/resources/demos/style.css">
 <link rel="stylesheet" href=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js">
  <script src="https://code.jquery.com/jquery-1.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  <script type="text/javascript" src="jquery.timepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

  
  <style>
  .disabled span{
    color:black !important;
    background:red !important;    
}
.enabled a{
    color:black !important;
    background:green !important;    
}
div.ui-datepicker{
 font-size:20px;
}
body {
      font: 400 18px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  
 .btn-default
{
 background-color:#669933;
 color:white;
}

  
  #plasma
  {
  height:280px;
  }
  /*#requirement
  {
  height: 450px;
  }*/
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }
  
  
  .jumbotron {

      
      background-color:white;
      color: #f4511e;

      padding: 80px 25px;

      font-family: Montserrat, sans-serif;
      
      

  }
 
  
  
  .container-fluid {

      padding: 60px 50px;

  }

  .bg-grey {

      background-color: #F0F0F0;
   	
  }

  

  .thumbnail {

      padding: 0 0 15px 0;

      border: none;

      border-radius: 0;

  }

  .thumbnail img {

      width: 80%;

      height: 100%;

      margin-bottom: 10px;

  }

  .carousel-control.right, .carousel-control.left {

      background-image: none;

      color: #f4511e;

  }

  .carousel-indicators li {

      border-color: #f4511e;

  }

  .carousel-indicators li.active {

      background-color: #f4511e;

  }

  .item h4 {

      font-size: 19px;

      line-height: 1.375em;

      font-weight: 400;

      font-style: italic;

      margin: 70px 0;

  }

  .item span {

      font-style: normal;

  }

  .panel {

      border: 1px solid #f4511e; 

      border-radius:0 !important;

      transition: box-shadow 0.5s;

  }

  .panel:hover {

      box-shadow: 5px 0px 40px rgba(0,0,0, .2);

  }

  .panel-footer .btn:hover {

      border: 1px solid #f4511e;

      background-color: #fff !important;

      color: #f4511e;

  }

  .panel-heading {

      color: #fff !important;

      background-color: #86b300 !important;

      padding: 25px;

      border-bottom: 1px solid transparent;

      border-top-left-radius: 0px;

      border-top-right-radius: 0px;

      border-bottom-left-radius: 0px;

      border-bottom-right-radius: 0px;

  }

  .panel-footer {

      background-color: white !important;

  }

  .panel-footer h3 {

      font-size: 32px;

  }

  .panel-footer h4 {

      color: #aaa;

      font-size: 14px;

  }

  .panel-footer .btn {

      margin: 15px 0;

      background-color: #f4511e;

      color: #fff;

  }

  .navbar,.dropdown-menu{

      margin-bottom: 0;

      background-color: #669933;

      z-index: 9999;

      border: 0;

      font-size: 12px !important;

      line-height: 1.42857143 !important;

      letter-spacing: 2px;

      border-radius: 0;

      font-family: Montserrat, sans-serif;
      min-height:65px;
    }
    #center
    {
      text-align:center;

  }
  

  .navbar li a, .navbar .navbar-brand {

      color: #fff !important;

  }

  .navbar-nav li a:hover, .navbar-nav li.active a,.dropdown-menu li a:hover,.dropdown-menu li.active a{

      color: black !important;

      background-color:#228B22 !important;
      min-height:65px;

  }

  .navbar-default .navbar-toggle {

      border-color: transparent;

      color: #fff !important;

  }

  footer .glyphicon {

      font-size: 40px;
      
      

      margin-bottom: 20px;

      color: #f4511e;

  }

  .slideanim {visibility:hidden;}

  .slide {

      animation-name: slide;

      -webkit-animation-name: slide;

      animation-duration: 1s;

      -webkit-animation-duration: 1s;

      visibility: visible;

  }

  @keyframes slide {

    0% {

      opacity: 0;

      -webkit-transform: translateY(70%);

    } 

    100% {

      opacity: 1;

      -webkit-transform: translateY(0%);

    }

  }

  @-webkit-keyframes slide {

    0% {

      opacity: 0;

      -webkit-transform: translateY(70%);

    } 

    100% {

      opacity: 1;

      -webkit-transform: translateY(0%);

    }

  }

  @media screen and (max-width: 768px) {

    .col-sm-4 {

      text-align: center;

      margin: 25px 0;

    }

    .btn-lg {

        width: 100%;

        margin-bottom: 35px;

    }

  }

  @media screen and (max-width: 480px) {

    .logo {

        font-size: 150px;

    }

  }
  
  .text:after {
    font-family: "Glyphicons Halflings";
    content: "\e114";
    float: right;
    margin-left: 15px;
  }
  /* Icon when the collapsible content is hidden */
  .text.collapsed:after {
    content: "\e080";
  }
.well
 {
    border: none;
    margin-top: 160px;
    margin-bottom: 100px;
    margin-right: 15%;
    margin-left: 15%;
    background-color: #F0F0F0 ;
}
table
  {
    
  }
  th
  {
  width:150px;
  text-align:left;
  background-color: #4CAF50;
    color: white;
  }
  #bloodType tr:hover {background-color: #ddd;}
</style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">



<nav class="navbar navbar-default  navbar-fixed-top">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>                        

      </button>

      <!--<a id="login" class="navbar-brand" href="#myPage">Login</a>-->



    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
      <li><a href="searchNearbyBloodDrive.html">SEARCH BLOOD DRIVE</a></li>

        <li><a href="scheduleAppointment.php">SCHEDULE APPOINTMENT</a></li>
        

        
<li><a href="bloodStatus.php">BLOOD GROUP STATUS</a></li>
        <li><a href="requestBlood.php">REQUEST BLOOD</a></li>

        <li><a href="query.php">SUBMIT QUERY </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>

      </ul>

    </div>

  </div>

</nav>
<div class="well">
  <h2 style="text-align:center; color:#f4511e;word-spacing: 6px;">Blood Group Status</h2><br>
  

<form method='post' action='bloodstatus.php' class="form-horizontal" role="form">

 <div class="form-group">
          <label class="control-label col-sm-4" for="email">Search Category:<span style="color:red">&nbsp;*</span></label>
           <div class="col-sm-5">
            <select name='category' id="radiusSelect" class="form-control" onchange="showUser(this.value)">
    		<option value="" selected>Select Blood Type:</option>
			<option value='A+'>A+</option>
			<option value='B+'>B+</option>
			<option value='AB+'>AB+</option>
			<option value='O+'>O+</option>
			<option value='O-'>O-</option>
			<option value='A-'>A-</option>
			<option value='B-'>B-</option>
			<option value='AB-'>AB-</option>

   			</select>
           </div>

      </div>
      <div class="form-group">
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-default" style="padding: 10px 38px">Submit</button>
        <a href=" " style="padding: 10px 19px; color:black" onclick="myFunction()"><font size="2">&#91;Cancel&#93;</font></a>
      </div>
    </div>
    <input type='hidden' name ='submitted' value='true'/>
 <!-- <label> 
<select name='category' onchange="showUser(this.value)" style="font-size:16">
     <option value="" selected="selected">Select Blood Type:</option>
	<option value='A+'>A+</option>
	<option value='B+'>B+</option>
	<option value='AB+'>AB+</option>
	<option value='O+'>O+</option>
	<option value='O-'>O-</option>
	<option value='A-'>A-</option>
	<option value='B-'>B-</option>
	<option value='AB-'>AB-</option>


</select>
</label>


<input type='submit'/>-->
</form>

<?php

if (isset($_POST['submitted']))
{
include('connect.php');

$category=$_POST['category'];
$criteria=$_POST['criteria'];
$query="SELECT * FROM blood_stock WHERE bloodgroup='$category'";
$result=mysqli_query($conn,$query) or die(' Error getting data');
$num_rows= mysqli_num_rows($result);

echo "$num_rows results found";
echo "<table  cellpadding='6' class='table table-striped' id='bloodType'>";
echo "<tr><th>Blood Type</th><th>Blood Status</th><th>Center</th><th>Address</th></tr>";

while($row= mysqli_fetch_array($result, MYSQLI_ASSOC))
{
echo "<tr><td>";
echo $row['bloodgroup'];
echo '</td><td>';
echo $row['bloodstatus'];
echo '</td><td>';
echo $row['center'];
echo '</td><td>';
echo $row['address'];
echo '</td>';
echo "</tr>";


}

echo "</table>";

} //end of main if statement

?>
</div>
</body>
</html>