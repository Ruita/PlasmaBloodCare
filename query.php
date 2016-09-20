<!DOCTYPE html>

<html lang="en">

<head>

  <!-- Theme Made By www.w3schools.com - No Copyright -->

  <title>Plasma Blood Care</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  
 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
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
</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<script>

function myFunction() {
    document.getElementById("myForm").reset();
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
  <h2 style="text-align:center; color:#f4511e">Message to Doctor</h2><br>
  
    <form class="form-horizontal" role="form">
    
      <div class="form-group">
      
        <label class="control-label col-sm-3" for="firstname" >First Name<span style="color:red">&nbsp;*</span></label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="firstname" placeholder="First Name" required>
        
        </div>
      </div>
       <div class="form-group">
      
        <label class="control-label col-sm-3" for="lastname" >Last Name</label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="lastname" placeholder="Last Name" required>
        
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="email">E-mail Address<span style="color:red">&nbsp;*</span></label>
           <div class="col-sm-5">
            <input type="email" class="form-control" id="email" placeholder="Email Address" required>
           </div>

      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="Phone" required>Phone<span style="color:red">&nbsp;*</span></label>
           <div class="col-sm-5">
            <input type="text" class="form-control" id="title" placeholder="(000)-000-0000" >
           </div>

      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="organizationSize">Doctor<span style="color:red">&nbsp;*</span></label>
         <div class="col-sm-5">
        <select class="form-control" id="sel1">
        <option>Select A Doctor</option>
        <option>Dr. Kedar Pande</option>
        <option>Dr. Joshi</option>
        <option>Dr. Ankita Patel</option>
        
      </select>
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-3" for="comment" >Message<span style="color:red">&nbsp;*</span></label>
       <div class="col-sm-7">
      <textarea class="form-control" rows="6" id="comment"></textarea>
     </div>
    </div>
      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-10">
        <button type="submit" class="btn btn-default" style="padding: 10px 38px">Submit</button>
        <a href=" " style="padding: 10px 19px; color:black" onclick="myFunction()"><font size="2">&#91;Cancel&#93;</font></a>
      </div>
    </div>
    
  </form>
</div>


</body>
</html>
