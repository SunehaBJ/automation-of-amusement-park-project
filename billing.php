<?php
include 'class.php';


?>

<!doctype html>
<html lang="en">
<head>
	<title>Awesome Amusement Park</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

	<header>
		<h1>Awesome Amusement Park</h1>
	</header>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="booking.php">Booking</a></li>
			<!--li><a href="facilities.php">Facilities</a></li-->
			<li><a href="games.php">Games</a></li>
			<li class="selected"><a href="#">Billing</a></li>
			<li><a href="about.php">About</a></li>
						<? if(isset($_SESSION["name"]))
	{	 ?>	
				<li><a href="#"></a> </li>
				<li><a href="logout.php">Logout</a></li>
	<?
	}
	?>

		</ul>
	</nav>
	<section id="intro"></section>
	<div id="content">
				<article class="stream">
					<header>
						<h2>Welcome to our Park - Live life In Color!</h2>
					</header>
						<br />
					<section class="messages">
					<h1>Details of the billings.</h1>
					<br>
					<?//echo $_SESSION['member'];
					if((!isset($_SESSION['member'])))
						{
						echo 'Sorry, you are not a member of park.<br>You are not allowed to do the billing.';
						exit();
						}
						if(($_SESSION['member']!=='1'))
						{
							echo 'Sorry, you are not a member of park.<br>You are not allowed to do the billing.';
							exit();
						}
					?>
					<iframe scrolling="no" style="border:none; overflow:hidden; width:680px; height:620px; background:#bdbcdb; border-radius:8px;" src="<? echo 'bill_single.php'; ?>">
					<!-- this is a sample search script from twitter.com/goodies . feel free to put your own stream scripts here -->
					</iframe>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'search',
  search: 'html5 or css3',
  interval: 6000,
  title: 'HTML5 / CSS3',
  subject: 'Awesomeness',
  width: 670,
  height: 2200,
  theme: {
    shell: {
      background: '#82d9fd',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#444444',
      links: '#1bbf5f'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: true,
    behavior: 'default'
  }
}).render().start();
</script>

					</section>
				</article>
				
		</div>
		
		<!--aside>
			<section>
				<ul>
					<li><a href="#"><img src="images/socialicons/twitter.png" alt="twitter" title="twitter" /></a></li>
					<li><a href="#"><img src="images/socialicons/facebook.png" alt="facebook" title="facebook" /></a></li>
					<li><a href="#"><img src="images/socialicons/friendfeed.png" alt="friendfeed" title="friendfeed" /></a></li>
					<li><a href="#"><img src="images/socialicons/stumbleupon.png" alt="stumbleupon" title="stumbleupon" /></a></li>
					<li><a href="#"><img src="images/socialicons/linkedin.png" alt="linkedin" title="linkedin" /></a></li>
					<li><a href="#"><img src="images/socialicons/picasa.png" alt="picasa" title="picasa" /></a></li>
					<li><a href="#"><img src="images/socialicons/flickr.png" alt="flickr" title="flickr" /></a></li>
					<li><a href="#"><img src="images/socialicons/mixx.png" alt="mixx" title="mixx" /></a></li>
					<li><a href="#"><img src="images/socialicons/reddit.png" alt="reddit" title="reddit" /></a></li>
					<li><a href="#"><img src="images/socialicons/digg.png" alt="digg" title="digg" /></a></li>
					<li><a href="#"><img src="images/socialicons/delicious.png" alt="delicious" title="delicious" /></a></li>
					<li><a href="#"><img src="images/socialicons/designfloat.png" alt="designfloat" title="designfloat" /></a></li>
					<li><a href="#"><img src="images/socialicons/diigo.png" alt="diigo" title="diigo" /></a></li>
					<li><a href="#"><img src="images/socialicons/dzone.png" alt="dzone" title="dzone" /></a></li>
					<li><a href="#"><img src="images/socialicons/myspace.png" alt="myspace" title="myspace" /></a></li>
					<li><a href="#"><img src="images/socialicons/google.png" alt="google" title="google" /></a></li>
					<li><a href="#"><img src="images/socialicons/gmail.png" alt="gmail" title="gmail" /></a></li>
					<li><a href="#"><img src="images/socialicons/rss.png" alt="rss" title="rss" /></a></li>
				</ul>
			</section>
			
		</aside-->

	<footer>
		<br />
		<p>&copy; 2015 <a href="#" title="your site name">Created by Suneha</a></p>
	</footer>
<!-- Free template created by http://freehtml5templates.com -->
</body>
</html>
