<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '75118114112-t2jm24gcbl40v3ljg81siqok82qnmj97.apps.googleusercontent.com'; 
$client_secret = 'dnpbwHmq0ZqMBbNgSi-R9cE_';
$redirect_uri = 'http://localhost/GoogleAPI/index.php';

//database
$db_username = "root"; //Database Username
$db_password = "root"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'plasma_blood_care'; //Database Name

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


?>
<!DOCTYPE html>

<html lang="en">

<head>

  

  <title>Plasma Blood Care</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  
  <!--Added external Userlogin file-->
  <link rel="stylesheet" type="text/css" href="userlogin.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 <script src="http://maps.google.com/maps/api/js?key=AIzaSyCWEtoieu-sOEBX41oPACqu4w1wxckRiUQ"
            type="text/javascript"></script>
            
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
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

      animation-duration: 2s;

      -webkit-animation-duration: 2s;

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
  
  /*Sign up with facebook, twitter and gmail*/
.facebook,.plus {
 background-color: #8E8E8E;
 border: 0;
 border-radius: 3px;
 color: #FFF;
 cursor: pointer;
 box-shadow: 2px 2px 2px #111;
  width: 100%;
 height: 40px;
 text-align: center;
  position: relative;
  padding: 0;
  margin: 10px 0;
}

.facebook,.plus span {
  font-size: 16px;
  line-height: 40px;
}

.facebook,.plus:active {
  top: 1px;
  box-shadow: 1px 1px 2px #000;
}

.facebook i {
  margin-right: 10px;
}

.facebook {
  background-color: #3B5998;
}

.facebook i {
 margin-left: 25px;
 float: left;
 width: 44px;
 height: 40px;
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAoCAYAAACFFRgXAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAN1JREFUeNpi/P//P8NQAoyjDh518KiDRx086uBh62AtIOZE4r8A4qcUmwpyMJWxKxA//I8J2qlhPguVQ9UMiLcAMRutoo2Jyub10tKxtEjDb4FYCIn/C4jXA/FHIN4BZQ8qB38AYn4k/kQgLhjMSQIdfB/saXhIlMMGQDwHic2MJHcBiE8h8ZsoLYup4WAbID5MhLq/QMxLaTKhZ5K4SY00TU8HX6CKKVSulh/SojpGxkOulBh18KiDRx086uDRxg9eoIvW46BOx3O0mz/q4FEHjzp41MGjDiYXAAQYAJmVcB6iaE2HAAAAAElFTkSuQmCC") no-repeat center center;
}


.plus {
  padding-left: 54px;
  background-color: #4285F4;
}

.plus .i {
  border-radius: 3px;
  margin-left: 25px;
 position: absolute;
 border-top: 8px solid #D64335;
 width: 44px;
  top: 0;
  bottom: 0;
  left: 0;
  
  /*border-right: 1px solid #343434;*/
  line-height: 26px;
}

.plus i:before {
 content: "g ";
 font: 29px "Palatino Linotype", Georgia, serif;
  text-shadow: 1px 1px 1px #444;
  line-height: 0px;
  margin-left: 10px;
}

.plus i:after {
 content: "+";
 border-left: 11px solid #426AAD;
 background-color: #32A45E;
 border-right: 11px solid #F8CA32;
 width: 11px;
 font: 18px "Palatino Linotype", Georgia, serif;
  line-height: 38px;
 position: absolute;
 top: -8px;
 left: 12px;
  height: 8px;
}

#background
{
  position: relative;
  z-index: 10;
  text-align:center;

}
  h5::before
{
  border-top: 2px solid #dfdfdf;
  content:"";
  margin: 0 auto;
  position: absolute; 
  top: 50%; left: 0; right: 1px; bottom: 0;
  z-index: -10;
  
}

h5 span
{
  background: #fff; 
  padding: 0 10px; 
}
  
  </style>

</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<script src="userlogin.js"></script>
<script>
function myFunctionHost()
{
window.open("HostADrive.html","_self");
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
function myFunctionForBloodDrive()
{
window.open("phpsqlsearch_map.html","_self");
}

</script>
<script>

		// initialize and setup facebook js sdk
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '281627685547472',
		      xfbml      : true,
		      version    : 'v2.7'
		    });
		    FB.getLoginStatus(function(response) {
		    	if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
		    });
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// login with facebook with extra permissions
		function login() {
			FB.login(function(response) {
				if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
			}, {scope: 'email'});
		}
		
		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				document.getElementById('status').innerHTML = response.id;
			});
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
<a  class=" navbar navbar-brand" href="" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-log-in"></span>Login</a>

<div id="id01" class="modal">

  <div class="modal-content animate" >
  
  <form>

    <div class="imgcontainer">
    
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span><br>
      <!--<img src="useravatar.png" alt="Avatar" class="avatar">-->
    </div>

    <div class="userprofile">

      <input class="form-control" type="text" placeholder="Enter Username" name="uname">

      <input class="form-control" type="password" placeholder="Enter Password" name="userpassword" />
     
        <span class="psw"><p align="right">Forgot <a href=" ">password?</a></span></p>
      <button id="button" type="submit"><font size="4">Login</font></button>
      
      <input type="checkbox" checked="checked"/> Remember me
      
    </div>
   
    
     </form>

  <div class="userprofile">
<h5 id="background" class="col-xs-12"><span><strong><font size="4px">Or</font></strong></span></h5>

	
      <button class="btn facebook" data-provider="facebook" onclick="login()" id="login"><i></i><span>Login with Facebook</span></button>

<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '75118114112-t2jm24gcbl40v3ljg81siqok82qnmj97.apps.googleusercontent.com'; 
$client_secret = 'dnpbwHmq0ZqMBbNgSi-R9cE_';
$redirect_uri = 'http://localhost/GoogleAPI/searchNearbyBloodDrive.html';

//database
$db_username = "root"; //Database Username
$db_password = "root"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'plasma_blood_care'; //Database Name

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
echo '<div >';
if (isset($authUrl)){ 
	//show login url
	echo '<div>';
	
	echo '<button class="btn plus" data-provider="gmail" onclick=window.open("' . $authUrl . '","_self") style="width:100%"><span class="i"><i></i></span><span>Login with Google</span></button>';
	echo '</div>';
	
} else {
	
	$user = $service->userinfo->get(); //get user info 
	
	// connect to database
	$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
	
	//check if user exist in database using COUNT
	$result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
	$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
	
	//show user picture
	echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
	
	if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    }
	else //else greeting text "Thanks for registering"
	{ 
        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		$statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
		$statement->execute();
		echo $mysqli->error;
    }
	
	//print user details
	echo '<pre>';
	print_r($user);
	echo '</pre>';
}
echo '</div>';


?>

      </div>

    <div  class="userprofile" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span>Not a member! <a href=" " onclick="myFunction()">
      Sign Up Here</span></a>
    </div>
    
    </div>

  
  
</div>


    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
      <li><a href="#requirement">NEWSLETTER</a></li>

        <li><a href="#about">ABOUT US</a></li>
        

        <li class="dropdown">
        <a  class="dropdown-toggle" data-toggle="dropdown" href="#">DONATE BLOOD
        <span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color:#669933">
        <li class="dropdown-header" style="color:#4d4d4d">BLOOD DRIVE
        <li><a href=" " onclick="myFunctionForBloodDrive()">SEARCH NEARBY BLOOD DRIVE</a></li>
          <li><a onclick="myFunctionHost()" href="">HOST A DRIVE</a></li>
          
          <li><a href="" onclick="myFunctionForSurvey()">DONOR SURVEY</a></li> 
          <li class="divider"></li>
          <li class="dropdown-header" style="color:#4d4d4d">BLOOD REPORT
          
          <li><a href=" " onclick="myFunctionForLocation()">BLOOD DONOR REPORT BY LOCATION</a></li>
          <li><a href=" " onclick="myFunctionForDonor()">ANNUAL BLOOD DONOR REPORT</a></li>
          
          </li>
        </ul>
      </li>
<li><a href="#donationFacts">BLOOD DONATION FACTS</a></li>
        <li><a href="#faq">FAQ</a></li>

        <li><a href="#stories">DONOR STORIES</a></li>

        <li><a href="#contact">CONTACT US</a></li>

      </ul>

    </div>

  </div>

</nav>



<div id="plasma" class="jumbotron text-center ">

  <h1>Plasma Blood Care</h1> 
  

  <p>Donate blood save a life!</p> 

  <form class="form-inline">

    <input type="email" class="form-control" size="50" placeholder="Email Address" required>

    <button type="button" class="btn btn-danger">Subscribe</button>
    

  </form>

</div>


<!-- Immediate Requirement -->

<div id="requirement" class="container-fluid text-center bg-grey" >

  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

    <!-- Indicators -->

    <ol class="carousel-indicators">

      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

      <li data-target="#myCarousel" data-slide-to="1"></li>

      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>



    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox" >

      <div class="item active">
          
        <h1 style="color:black ">Immediate Requirement</h1>
		<div style="text-align=Center">
        <h4>We have an immediate requirement of following blood groups, please visit following blood drive as soon as possible: <br><b style="color:#900000">O+ </b> , <b style="color:#900000">AB- </b> </h4>
        <h4 style="margin-left:15%" class="col-sm-4"><strong>Blood Bank Fremont<br>Address: </strong>200 Main St, Fremont, CA 94555<br><strong>Phone:</strong>(888) 723-7831<a href="https://www.google.com/maps/place/Fremont,+CA/@37.5293037,-122.1390356,11z/data=!3m1!4b1!4m5!3m4!1s0x808fbf46b7e8caf7:0x8ada313b89d888d4!8m2!3d37.5482697!4d-121.9885719"><br>Get Directions</a></h4>

        <img class="col-sm-8" src="pbc11.jpg" alt="Blood donor and reciver chart" style="width:304px;height:300px;">
        
        </div>
        
       
      </div>

      <div class="item">
      
        <h1 style="color:black">Upcoming Blood Drive</h1>

        <h4><strong>Blood Bank Peninsula<br>Address: </strong>260 Main St, Redwood City, CA 94063<br><strong>Phone:</strong>(888) 723-7831<a href="https://www.google.com/maps/dir//''/@37.4933867,-122.2986769,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x808fa253dc02845d:0xaec4fa769aa7d7ae!2m2!1d-122.2286369!2d37.4934074"><br>Get Directions</a></h4>

      </div>

      <div class="item">
      	
      	<h1 style="color:black">Special Rewards</h1>

        <h4>"Donate blood and receive one free movie ticket."<br><span style="font-style:normal;"><img src="pbc7.jpg" alt="Movie Ticket" style="width:304px;height:100px;"></span></h4>

      </div>

    </div>



    <!-- Left and right controls -->

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">

      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

      <span class="sr-only">Previous</span>

    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">

      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

      <span class="sr-only">Next</span>

    </a>

  </div>

</div>

<!-- Container (About Section) -->

<div id="about" class="container-fluid">

  <div class="row">
<h2 align="center">About Us</h2><br>
    <div class="col-sm-7">
    <p align="Justify">Emergency situations such as accidents, surgery creates an immediate and critical need for specific blood types. In such emergency cases, it is difficult for hospital staff to arrange particular blood type without proper resources. These days’ with fast paced life people don’t have time to stand in lines and waiting rooms for blood donation. Plasma Blood Care solves these problems and act like a lifesaver system. This system provides online access to requestor and donor to facilitate the blood donation and check the status of each blood type.</p>
 <label>&#34;A pint of sweat will save a gallon of blood.&#34;&#32;&#45; George S. Patton

</label>
      

    </div>
    <div class="col-sm-5">
 <img src="pbc8.jpg" class="img-responsive" alt="Blood donation statistics" style="width:450px;height:450px;">
 </div>

    <div class="col-sm-4">

     

  </div>

</div>
</div>


<div id="donationFacts" class="container-fluid bg-grey">

  <div class="row">

    <!--<div class="col-sm-4">

      <span class="glyphicon glyphicon-globe logo slideanim"></span>

    </div>-->
    <h2 align="center">Blood Donation Facts</h2><br>
    <div class="col-sm-10">

      
      <div class="embed-responsive embed-responsive-16by9 col-lg-8 col-md-6 col-sm-6" style="margin-left:25%; margin-right:25%">
    <iframe class="embed-responsive-item" style=" border: 3px solid #73AD21; " src="https://www.youtube.com/embed/OMzkDmbjmxQ"></iframe>
  </div>
  <div>
    
      <h4><strong>General Blood Donation Criteria:</h4></strong>
      <ol>
      <li style="color:black"><label style="color:black">For your health and well-being, you must:</label></li>
<ul>
<li>Be between 16 and 60 years old</li>
<li>Weigh at least 45 kg</li>
<li>Have a hemoglobin level of at least 12.5 g/dl</li>
<li>Generally be in good health</li>
<li>Not have had any symptoms of infection for at least 1 week e.g. sore throat, cough, runny nose, diarrhea</li>
<li>Not have had a fever in the last 3 weeks</li>
</ul>

<li style="color:black"><label style="color:black">In addition to the above requirements, apheresis donors should also:</label></li>
<ul>
<li>Weigh more than 50 kg</li>
<li>Be at least 18 years old</li>
<li>Not be more than 50 years old (for new apheresis donors only)</li>
<li>Have had donated blood at least once before</li>
<li>Have arm veins of a suitable size</li>
</ul>
</ol>
<h4><strong>Pre-blood Donation Workshop:</h4></strong>
<label>Mon-Fri 2:30pm-3:30pm</label> 
</div>
      
    </div>

  </div>

</div>



<!-- Container (Services Section) -->

<div id="faq" class="container-fluid text-center">

  <h2>FAQ</h2>
  
<div class="container">
  
  <div class="panel-group" id="accordion">
  
    <div class="panel panel-default">
      <div class="panel-heading">
       
        <h6 class="panel-title" align="left">
       
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class ="text" >How does the blood donation process work?</li></a></ol>
        </h6>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body" align="left">The blood donation process is only about 8-10 minutes on average. The steps in the process are:<br>
<b>Registration</b><br>
<ol>
  <li>You will complete donor registration, which includes information such as your name, address, phone number, and donor identification number (if you have one).</li>
  <li>You will be asked to show a donor card, driver’s license or two other forms of ID.</li>
</ol>
<b>Health History and Mini Physical</b>
<ol>
  <li>You will answer some questions during a private and confidential interview about your health history and the places you have traveled.</li>
  <li>You will have your temperature, hemoglobin, blood pressure and pulse checked.</li>
</ol>
<b>Donation </b>
<ol>
   <li>We will cleanse an area on your arm and insert a brand–new, sterile needle for the blood draw. This feels like a quick pinch and is over in seconds.</li>
   <li> You will have some time to relax while the bag is filling. (For a whole blood donation, it is about 8-10 minutes. If you are donating platelets, red cells or plasma by apheresis the collection can take up to 2 hours.)</li>
<li>When approximately a pint of blood has been collected, the donation is complete and a staff person will place a bandage on your arm. </li>
</ol>
<b>Refreshments</b>
<ol>
  <li>You will spend a few minutes enjoying refreshments to allow your body time to adjust to the slight decrease in fluid volume.</li>
</ol>
</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h6 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class= "text">What should I do after donating blood?</a>
        </h6>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body" align="left">After you give blood:
<ul>
    <li><B>Take the following precautions:</b></li>
    <ul>
        <li>Drink an extra four glasses (eight ounces each) of non-alcoholic liquids.</li>
		<li>Keep your bandage on and dry for the next five hours, and do not do heavy exercising or lifting.</li>
		<li>If the needle site starts to bleed, raise your arm straight up and press on the site until the bleeding stops.</li>
		<li>Because you could experience dizziness or loss of strength, use caution if you plan to do anything that could put you or others at risk of harm. For any hazardous 	occupation or hobby, follow applicable safety recommendations regarding your return to these activities following a blood donation.</li>
		</li>Eat healthy meals and consider adding iron-rich foods to your regular diet, or discuss taking an iron supplement with your health care provider, to replace the iron lost with blood donation.</li>
	</ul>
<li><b>If you get a bruise:  </b>
Apply ice to the area intermittently for 10-15 minutes during the first 24 hours. Thereafter, apply warm, moist heat to the area intermittently for 10-15 minutes. A rainbow of colors may occur for about 10 days.</li>
<li><b>If you get dizzy or lightheaded:</b>  Stop what you are doing, lie down, and raise your feet until the feeling passes and you feel well enough to safely resume activities.</li>
<li>And remember to enjoy the feeling of knowing you have helped save lives!</li>
<li>Schedule your next appointment.</li>
<li>If this is your first donation, expect your Donor Card in the mail within 2-3 weeks.</li>
</ul>
</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"  class= "text">Will it hurt when you insert the needle?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body" align="left">Only for a moment. Pinch the fleshy, soft underside of your arm. That pinch is similar to what you will feel when the needle is inserted.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class= "text">How long does a blood donation take?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body" align="left">The entire process takes about one hour and 15 minutes; the actual donation of a pint of whole blood unit takes eight to 10 minutes. However, the time varies slightly with each person depending on several factors including the donor’s health history and attendance at the blood drive.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" class= "text">How long will it take to replenish the pint of blood I donate?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body" align="left">The plasma from your donation is replaced within about 24 hours. Red cells need about four to six weeks for complete replacement. That’s why at least eight weeks are required between whole blood donations.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6" class='text'>Why does the Plasma Blood Care ask so many personal questions when I give blood?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body" align="left">The highest priorities of the Plasma Blood Care are the safety of the blood supply and our blood donors. Some individuals may be at risk of transferring communicable disease through blood donation due to exposure via travel or other activities or may encounter problems with blood donation due to their health. We ask these questions to ensure that it is safe for patients to receive your blood and to ensure that it is safe for you to donate blood that day.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7" class='text'>How often can I donate blood?</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body" align="left">You must wait at least eight weeks (56 days) between donations of whole blood and 16 weeks (112 days) between double red cell donations. Platelet apheresis donors may give every 7 days up to 24 times per year. Regulations are different for those giving blood for themselves (autologous donors).</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8" class='text'>Who can donate blood?</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body" align="left">In most states, donors must be age 17 or older. Some states allow donation by 16-year-olds with a signed parental consent form. Donors must weigh at least 110 pounds and be in good health. Additional eligibility criteria apply.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9" class='text'>Can I donate blood for myself?</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body" align="left">An autologous donation is when you donate blood for yourself before having surgery or a planned medical procedure. Autologous donations require a physician prescription. Contact your doctor first to find out if you should donate blood for yourself.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" align="left">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10" class='text'>Is it safe to give blood?</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body" align="left">Donating blood is a safe process. Each donor’s blood is collected through a new, sterile needle that is used once and then discarded. Although most people feel fine after donating blood, a small number of people may feel lightheaded or dizzy, have an upset stomach or experience a bruise or pain where the needle was inserted. Extremely rarely, loss of consciousness, nerve damage or artery damage occur.</div>
      </div>
    </div>
  </div>
</div>


</div>






<!-- Container (FAQ Section) -->

<div id="stories" class="container-fluid">

  <div class="text-center">

    <h2>Donor Stories</h2>

    

  </div>

  <div class="row slideanim">

    <div class="col-sm-4 col-xs-12">

      <div class="panel panel-default text-center">

        <div class="panel-heading">

          <h1>Joel</h1>

        </div>

        <div class="panel-body">

          <p style="padding: 0 0 5.7em 0" align="Justify"><strong>I have been a donor for a couple of years.  I set a goal of earning my 10 gallon pin this year and have been dutifully donating platelets in Plymouth every 2 weeks to reach that goal.  I'm now only 3 donations away from the goal and I'm realizing that I look forward to the experience as much as achieving 10 gallons.  The Plymouth office greets me by name and treats me like a friend.  I look forward to catching up with Yassah, Kat and Aleysha (sp?).  They are true professionals and very good at their jobs. They are also quite personable, friendly and have a great sense of humor! </strong> </p>

          

        </div>

      

      </div>      

    </div>     

    <div class="col-sm-4 col-xs-12">

      <div class="panel panel-default text-center">

        <div class="panel-heading">

          <h1>Gregg</h1>

        </div>

        <div class="panel-body">

          <p style="padding: 0 0 7.5em 0" align="Justify"><strong> "It makes me feel good knowing that I'm helping people in need, to save a life! When I was 10 years old I received a blood transfusion from a wonderful person who donated their blood like I do. I wish I could have met that person because without them I would have died! If you are healthy and can donate your blood and 20 minutes of your time please do it! The needle may hurt a little but you can save up to three lives with one donation! I visit the downtown location. The staff are great and so are the snacks!"</strong> </p>

          

        </div>

        

      </div>      

    </div>       

    <div class="col-sm-4 col-xs-12">

      <div class="panel panel-default text-center">

        <div class="panel-heading">

          <h1>Seon</h1>

        </div>

        <div class="panel-body">

          <p style="padding: 0 0 0.4em 0" align="Justify"><strong> "I went to donate blood today 2/18/11. I was a little nervous the last time I had donated blood did not go very smoothly. Kelly was the nurse that worked with me and she was GREAT!!! Very nice and kept me talking. It went so smoothly. I would not hesitate to come back. The clinic was warm and welcoming, you did not feel rushed at all. There were plenty of snacks to choose from and different beverages. It was a great experience and I thought Kelly was amazing - she knew just how to handle a nervous patient. The other staff (I did not catch their names) were great, too. They would smile when I looked over and cracked jokes. You could tell everyone enjoyed working there. Thanks!" </strong> </p>

         

        </div>

        <div>

          

        </div>

      </div>      

    </div>    

  </div>
  <div style="text-align:center">
<a href="userStory.html " ><font size="4.5" ><strong>Tell us your story</strong></font></a>
</div>
</div>



<!-- Container (Contact Section) -->

<div id="contact" class="container-fluid ">

  <h2 class="text-center">CONTACT</h2>

  <div class="row">

    <div class="col-sm-4">

      
      <P style="color:black"><strong>Address:</strong><p>
      <p><span class="glyphicon glyphicon-map-marker"></span> San Jose,US</p>

      <p><span class="glyphicon glyphicon-phone"></span> +408 345 6789</p>

      <p><span class="glyphicon glyphicon-envelope"></span> pbc@gmail.com</p>
      <P style="color:black"><strong>Office</strong><p>
      <P>Mon &ndash;Sat 9:00 am &ndash;6:00 pm</p>
      <p>Sun 10:00 am &ndash; 5:00 pm</p>
</strong><p>

    </div>

    <div class="col-sm-7 slideanim">

      <div class="row">
        <p>Thank you for your interest in Plasma Blood Care. Please complete this form and we'll get back to you within 24 hours.</p>
        <div class="col-sm-7 form-group">
          
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>

        </div>

        <div class="col-sm-7 form-group">

          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>

        </div>

      </div>

      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>

      <div class="row">

        <div class=" col-sm-7 form-group">

          <button class="btn btn-default" type="submit" style="padding: 12px 45px;background-color:#669933; color:white">Send</button>
          <a href="index.html" style="padding: 10px 19px; color:black"><font size="2">&#91;Cancel&#93;</font></a>
        </div>

      </div>

    </div>

  </div>

</div>



<div id="googleMap" style="height:400px;width:80%;margin-left:10%;margin-right:10%;"></div>
<div style="text-align:center">
<a href="https://www.google.com/maps/place/San+Jose,+CA/@37.2966853,-122.0975973,10z/data=!3m1!4b1!4m5!3m4!1s0x808fcae48af93ff5:0xb99d8c0aca9f717b!8m2!3d37.3382082!4d-121.8863286"><font size="4">Get Directions</font></a>
</div>



<!-- Add Google Maps -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWEtoieu-sOEBX41oPACqu4w1wxckRiUQ&sensor=false&extension=.js"></script>


<script>

var myCenter = new google.maps.LatLng(37.33820, -121.886329);

var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:12,

  scrollwheel:false,

  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>



<footer class="container-fluid text-center">

  <a href="#myPage" title="To Top">

    <span class="glyphicon glyphicon-chevron-up"></span>

  </a>

  <p style="font-size:18px;">&copy; 2016| Plasma Blood Care. All Rights Reserved. </p>

</footer>



<script>

$(document).ready(function(){

  // Add smooth scrolling to all links in navbar + footer link

  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {



    // Prevent default anchor click behavior

    event.preventDefault();



    // Store hash

    var hash = this.hash;



    // Using jQuery's animate() method to add smooth page scroll

    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area

    $('html, body').animate({

      scrollTop: $(hash).offset().top

    }, 900, function(){

   

      // Add hash (#) to URL when done scrolling (default click behavior)

      window.location.hash = hash;

    });

  });

  

  // Slide in elements on scroll

  $(window).scroll(function() {

    $(".slideanim").each(function(){

      var pos = $(this).offset().top;



      var winTop = $(window).scrollTop();

        if (pos < winTop + 600) {

          $(this).addClass("slide");

        }

    });

  });

})

</script>



</body>

</html>