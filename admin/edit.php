<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($id, $firstname, $lastname, $phone, $email,$organization,$address,$city,$zip, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

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

      letter-spacing: 5px;

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

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<!--<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>

<strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/>

<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br/>

<strong>Phone: *</strong> <input type="text" name="phone" value="<?php echo $phone; ?>" /><br/>

<strong>Email: *</strong> <input type="email" name="email" value="<?php echo $email; ?>" /><br/>

<strong>Organization: *</strong> <input type="text" name="organization" value="<?php echo $organization; ?>"/><br/>

<strong>Address: *</strong> <input type="text" name="address" value="<?php echo $address; ?>"/><br/>

<strong>City: *</strong> <input type="text" name="city" value="<?php echo $city; ?>"/><br/>

<strong>Zip: *</strong> <input type="text" name="zip" value="<?php echo $zip; ?>"/><br/>


<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>-->



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

      <ul class="nav navbar-nav" id="center">
      <li><a href="view.php">BLOOD DRIVE HISTORY</a></li>

        <li><a href="new.php">ADD BLOOD DRIVE</a></li>
        

        
<li><a href="viewDonor.php">DONOR RECORD</a></li>
        <li><a href="newDonor.php">ADD DONOR</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="adminLogout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>

      </ul>

    </div>

  </div>

</nav>


  <div class="well">
  <h2 style="text-align:center; color:#f4511e">Update Blood Drive!</h2><br>
  
    <form class="form-horizontal" role="form" action="" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
   <div class="form-group">
     
        <label class="control-label col-sm-3" for="firstname" >ID:&nbsp;<?php echo $id; ?></label>
        
        
      </div>
      <div class="form-group">
     
        <label class="control-label col-sm-3" for="firstname" >First Name<span style="color:red">&nbsp;*</span></label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required>
        
        </div>
      </div>
       <div class="form-group">
      
        <label class="control-label col-sm-3" for="lastname" >Last Name<span style="color:red">&nbsp;*</span></label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="lastname" placeholder="Last Name"  name="lastname" value="<?php echo $lastname; ?>" required>
        
        </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="email">E-mail Address<span style="color:red">&nbsp;*</span></label>
           <div class="col-sm-5">
            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>"required>
           </div>

      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="Phone" required>Phone<span style="color:red">&nbsp;*</span></label>
           <div class="col-sm-5">
            <input type="text" class="form-control" id="title" placeholder="(000)-000-0000"  name="phone" value="<?php echo $phone; ?>" required>
           </div>

      </div>
      
      <div class="form-group">
      
        <label class="control-label col-sm-3" for="organization" >Organization<span style="color:red">&nbsp;*</span></label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="organization" name="organization" value="<?php echo $organization; ?>" required>
        
        </div>
        </div>
      
      
        <div class="form-group">
      
        <label class="control-label col-sm-3" for="address" >Address</label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" required>
        
        </div>
        </div>
        <div class="form-group">
      
        <label class="control-label col-sm-3" for="city" >City</label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" required>
        
        </div>
        </div>
        
        <div class="form-group">
      
        <label class="control-label col-sm-3" for="zip" >Zip Code</label>
        
        <div class="col-sm-5">
        
         <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $zip; ?>" required>
        
        </div>
        </div>
    
    
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-10">
        <button type="submit" name="submit" value="submit" class="btn btn-default" style="padding: 10px 38px">Submit</button>
        <a href="view.php" style="padding: 10px 19px; color:black"><font size="2">&#91;Cancel&#93;</font></a>
      </div>
    </div>
    
  </form>
</div>

</body>

</html>

<?php

}







// connect to the database

include('connect-db.php');



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];

$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));

$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));

$phoneNumber = mysql_real_escape_string(htmlspecialchars($_POST['phone']));

$emailId = mysql_real_escape_string(htmlspecialchars($_POST['email']));

$organization = mysql_real_escape_string(htmlspecialchars($_POST['organization']));

$address = mysql_real_escape_string(htmlspecialchars($_POST['address']));

$city = mysql_real_escape_string(htmlspecialchars($_POST['city']));

$zip = mysql_real_escape_string(htmlspecialchars($_POST['zip']));

// check that firstname/lastname fields are both filled in

if ($firstname == '' || $lastname == ''|| $phoneNumber == '' || $emailId == '' || $organization == '' || $address == '' || $city == '' || $zip == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($id, $firstname, $lastname, $phoneNumber, $emailId, $organization, $address, $city, $zip, $error);

}

else

{

// save the data to the database

mysql_query("UPDATE players SET firstname='$firstname', lastname='$lastname', phone='$phoneNumber', email='$emailId', organization='$organization', address='$address',city='$city', zip='$zip'  WHERE id='$id'")

or die(mysql_error());



// once saved, redirect back to the view page

header("Location: view.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM players WHERE id=$id")

or die(mysql_error());

$row = mysql_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$firstname = $row['firstname'];

$lastname = $row['lastname'];

$phoneNumber=$row['phone'];

$emailId = $row['email'];

$organization = $row['organization'];

$address = $row['address'];

$city = $row['city'];

$zip = $row['zip'];

// show form

renderForm($id, $firstname, $lastname,$phoneNumber,$emailId,$organization,$address, $city, $zip, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>