<?php
mysql_connect('localhost','root','root');
mysql_select_db('plasma_blood_care');
$sql= "SELECT * FROM blood_drive"; 
$records=mysql_query($sql);
?>
<html>
<head>
<title>
Organizer Details
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .table{
  margin-left:15%;
  margin-right:15%;
   margin-top:5%;
   width:70%;
   }
   h1{
   margin-left:15%;
  margin-right:15%;
   margin-top:10%;
   text-align:center;
   color:#f4511e;
   }
   body {
      font: 400 18px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
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
  
  </style> 
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<script src="userlogin.js"></script>
<script>
function myFunction()
{

if (confirm("Are you sure you want to Logout") == False) {
       
       window.location="http://localhost/GoogleAPI/userProfile.html";
    } 
    else
    {
    window.location="http://localhost/GoogleAPI/Logout.php";
    }
    
}
function myFunctionForSurvey()
{
window.open("donorSurvey.html","_self");
}
function myFunctionForLocation()
{
window.open("donorslocation.html","_self");
}
function myFunctionForDonor()
{
window.open("donorReport.html","_self");
}
</script>

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
      <li><a href="#requirement"> BLOOD DRIVE</a></li>

        <li><a href="#about">SCHEDULE APPOINTMENT</a></li>
        

        
<li><a href="#donationFacts">BLOOD GROUP STATUS</a></li>
        <li><a href="#faq">REQUEST BLOOD</a></li>

        <li><a href="">SUBMIT QUERY </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>

      </ul>

    </div>

  </div>

</nav>

<div class="container">
<h1>Blood Drive Details</h1>
</div>

<table class="table table-striped">

    <thead>
      <tr>
        <th>Orgnizer_Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Phone No.</th>
		<th>Email_Id</th>
		<th>Blood Drive Address</th>
      </tr>
    </thead>
<?php
 
 while($organizer=mysql_fetch_assoc($records))
 {
 echo"<tbody>";
 echo "<tr>";
 echo "<td>" .$organizer['id']."</td>";
 echo "<td>" .$organizer['fname']."</td>";
 echo "<td>" .$organizer['lname']."</td>";
 echo "<td>" .$organizer['phone']."</td>";
 echo "<td>" .$organizer['email']."</td>";
 echo "<td>" .$organizer['blood_drive_address']."</td>";
 echo "</tr>";
 echo"</tbody>";
 }
 ?>
 </table>
 </body>
 </html>