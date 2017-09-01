<?php
include 'class.php';
$db=new database();
$db->connect();
//echo $_POST['name'].'<br>'. $_POST['dob'].'<br>'.$_POST['col'].'<br>'.$_POST['g'].'<br>'.$_POST['ag'].'<br>';

if(isset($_POST['submit1']))
{

		//$name=$_POST['name'];
		if(!isset($_POST['nmbr'])) $nmbr='';
		else $nmbr=$_POST['nmbr'];
		if(!isset($_POST['nam'])) $nam='';
		else $nam=$_POST['nam'];
		if(!isset($_POST['amt'])) $amt='';
		else $amt=$_POST['amt'];
		if(!isset($_POST['id'])) $id='';
		else $id=$_POST['id'];

		if(!isset($_POST['pwd'])) $pwd='';
		else $pwd=$_POST['pwd'];

		if($nmbr!==''&&$nam!==''&&$pwd!=='')
		{

		//Insert into single(name,dob,ag,col,gen) values ('".$_POST['name']."','".$_POST['dob']."','".$_POST['ag']."','".$_POST['col']."','".$_POST['g']."')")
		$re=mysql_query("update single set cname='".$nam."',cpwd='".$pwd."',amt=".$amt.",cnmbr=".$nmbr." where id='".$id."'");
			if($re)
			{
			$price=1000;
			$booking=1;
			
			echo '<center><br><br><br><br><br><h1>Your booking has been done successfully</h1>';
			exit();
			}
			else
			echo 'we are so sorry for the inconvenience.  Try again.';
		}
		else
		{
		echo '<font color="red">All fields must be filled!</font>';
		//exit();
		}
}


if(isset($_POST['submit']))
{
	if(isset($_SESSION["name"]))
	{
	$name=$_SESSION["name"];
	$g=$_SESSION['gender'];
	$ag=$_SESSION['age'];
	}
	else
	{
		$name=$_POST['name'];
		if(!isset($_POST['g'])) $g='';
		else $g=$_POST['g'];
		if(!isset($_POST['ag'])) $ag='';
		else $ag=$_POST['ag'];
	}
		$dob=$_POST['dob'];
		if(!isset($_POST['col'])) $col='';
		else $col=$_POST['col'];

		if(($name!==''&&$dob!==''&&$col!=='')||($name!==''&&$dob!==''&&$col!==''&&$g!==''&&$ag!==''))
		{

		//Insert into single(name,dob,ag,col,gen) values ('".$_POST['name']."','".$_POST['dob']."','".$_POST['ag']."','".$_POST['col']."','".$_POST['g']."')")
		$re=mysql_query("insert into single(name,dob,ag,col,gen) values('$name','$dob','$ag','$col','$g')");
			if($re)
			{
			$price=1000;
			$booking=1;
			$qid=mysql_fetch_assoc(mysql_query('select max(id) as uid from single'));
			$id=$qid['uid'];
			if(isset($_SESSION['name']))
			{
			if($ag=='SC')
			$price=700;
			else if($col==1)
			$price=800;
			else if($ag=='C')
			$price=500;
			}
			
			echo '<center><br><br><br><br><br><h1>Your booking is in prgress.<br>Please do not go back or refresh.<br>You have to pay Rs.'.$price.'</h1>';
			//exit();
			}
			else
			echo 'we are so sorry for the inconvenience.  Try again.';
		}
		else
		{
		echo '<font color="red">All fields must be filled!</font>';
		//exit();
		}
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Custom Login Form Styling</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
        <link rel="stylesheet" href="public/css/default.css" type="text/css">

		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #82D9FD url(images/abc.png) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
    </head>
    <body><center>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="http://tympanus.net/Tutorials/RealtimeGeolocationNode/">
                    <strong><? if(isset($_SESSION["name"])){ echo 'You are logged in as '.$_SESSION["name"].'.'; }?> </strong>
                </a>
                <span class="right">
                    <!--a href="logout.php">
                        <strong>Logout</strong>
                    </a-->
                </span>
            </div><!--/ Codrops top bar -->
			
			<header>
			
				<h1>Click an option</h1>
				<h2></h2>
				
				<nav class="codrops-demos">
					<a class="current-demo" href="#">Single Booking</a>
					<a href="bill_group.php">Group Booking</a>
					
				</nav>

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
	
	

			<section class="mai">
			
			<?
			if(isset($booking))
			{
			?>
			
			
				<form class="form-" action="" method="POST">
					<p class="clearfix" >
				        <label for="nmbr"><b>Card number : </b></label>
				        <input type="text" name="nmbr" id="nmbr" placeholder="card number" > 
				    </p><br>
					 <p class="clearfix" >
				        <label for="nam"><b>Owner's name as on card : </b></label>
				        <input type="text" name="nam" id="nam" placeholder="name" > 
				    </p><br>
					 <p class="clearfix" >
				        <label for="amt"><b>Amount : </b></label>
				        <input type="text" name="amt" id="amt" value="<?=$price;?>" readonly> 
				    </p><br>					 <p class="clearfix" >
				        <label for="id"></label>
				        <input type="hidden" name="id" id="id" value=<?=$id;?>> 
				    </p><br>
					<p class="clearfix" >
				        <label for="pwd"><b>Password : </b></label>
				        <input type="password" name="pwd" id="pwd" placeholder="password" > 
				    </p><br>
				    <p class="clearfix">
				        <input type="submit" name="submit1" value="Continue">
						<a href="single.php"><button value="Cancel" name="Cancel">Cancel</button></a>
				    </p>       <br>
				</form>​<br><br><br>
			<? exit(); } ?>
			
			
			
				<form class="form-" action="" method="POST">
					 <p class="clearfix" >
				        <label for="name"><b>Your name : </b></label>
				        <input type="text" name="name" id="name" placeholder="name" > 
				    </p><br>

					<p class="clearfix" >
				        <label for="g"><b>Gender : </b></label>
				        <input type="radio" name="g" value="M">Male
						<input type="radio" name="g" value="F">Female
     			 </p><br>
				<p class="clearfix" >
				        <label for="ag">Age Group : </label>
				        <input type="radio" name="ag" value="C">Children
						<input type="radio" name="ag" value="A">Adult
						<input type="radio" name="ag" value="SC">Senior citizen
				    </p><br>	 
				<p class="clearfix"  >
				        <label for="col"><b>Are you a college student : </b></label>
				        <input type="radio" name="col" value="1">Yes
						<input type="radio" name="col" value="0">No
				    </p><br>								
					<p class="clearfix">
				        <label for="dob"><b>Booking Date : </b></label>
						 <div class="main-wrapper">
				        <input type="date" min=2014-09-08 name="dob" id="datepicker-example2"> 
						</div>
				    </p><br>
				    <!--p class="clearfix">
				        <input type="checkbox" name="remember" id="remember">
				        
				    </p><br--->
				    <p class="clearfix">
				        <input type="submit" name="submit" value="Submit">
				    </p>       <br>
				</form>​<br><br><br>
				Note : You  wont get discounts unless you have logged in.
			</section>	
			
        </div>
        <script type="text/javascript" src="public/javascript/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="public/javascript/zebra_datepicker.js"></script>
        <script type="text/javascript" src="public/javascript/core.js"></script>


    </body>
</html>