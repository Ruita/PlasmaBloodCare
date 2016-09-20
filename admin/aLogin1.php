<?php
	session_start();
	include('aLogin.php');
	ob_start();
   if(isset($_POST['login']))
   {
	   $username=$_POST['username'];
	   $password=$_POST['password'];
	   include("connect.php");
	   $sel="select username,password from admin where username='$username' and password='$password'";
	   $result=$con->query($sel);
		if ($row=mysqli_fetch_array($result))
		{	
		    
        		
				header("Location:updateAdmin.php?username=username");
		        
		              
		             
		     }      /*$_SESSION['uid']=$row['id'];
				   $uid= $_SESSION['uid'];*/
			
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
				
				
	           	}
   }

?>