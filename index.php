<?php
session_start();
if (isset($_SESSION["username"])) {
	header('location:pages/Billingsystem.php');
} else {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>
		<meta name="description" content="Hospitality">
  		<meta name="keywords" content="Housekeeping, catering, Guest House">
  		<meta name="author" content="Mr. Amardeep Soni">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/bbrlogo.png" type="image/png" sizes="16x16">

	<title>Home |BBR</title>
	<link rel="stylesheet" type="text/css" href="style/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' >
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="jquery/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="js/loginAuth.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$("#login").click(function(){
				$("#rotatediv").addClass("rotate_anim");
				$("#hides").addClass("hides_anim");
				$("#shows").addClass("show_anim");
			});
			$("#signup").click(function(){
				$("#rotatediv").addClass("rotate_anim");
				$("#hides").addClass("hides_anim");
				$("#shows").addClass("hides_anim");
				$("#shows2").addClass("show_anim");
			});
			$("#back").click(function(){
				$("#rotatediv").removeClass("rotate_anim");
				$("#hides").removeClass("hides_anim");
				$("#shows").removeClass("show_anim");
			});




		});

	</script>
	<style type="text/css">

		.imgalign
		{
			width: 10vw;
			height:9vw;
			margin-left: 30px;
			float:left;
			margin-top: 30px;

		}
		strong
		{

		}
		.footer_partition
		{
			width: auto;
			height: 40vw;
			text-align: center;
			float: left;
			display: flex;
			flex-direction: column;

			align-items: center;
			text-align: left;
			padding: 50px;
			line-height: 30px;



		}
		.footer_partition > a
		{
			text-decoration: none;
			color: white;
						transition: .5s;
						font-size: 1.2vw;

		}
			.footer_partition > a:hover
			{
				transition: .5s;
			color: #ffaa00;
			}
	</style>
</head>
<body>
<div class="admin_container">

</div>
<div style="width: 100%; height: 100vh;background: black; opacity: 0.4;position: absolute;">

</div>
<div class="login_form">
	<div class="header">
	<img src="images/bghead.png" style="width: 100%; height: 20vw; pointer-events: none;margin: 0;">

	</div>
	<div class="body">

		<div class="login_container">

			<div id="rotatediv" class="loginform" style="">

				<div id="hides" class="side front">
					<div style="width: 100%; height: 255px; display: flex;flex-direction;justify-content: center;align-items: center; ">
					<button id="login" style="width: 40%;height: 50px; border: none;border: 2px solid yellow;transition: 0.5s;">Log In</button><button id="signup" style="width: 40%;height: 50px; margin-left:10px;">Sign Up</button>
					</div>
				</div>
				<div id="shows" class="side back">
					<div class="forms">
						<form id="frm" action="php/loginAuth.php" method="post">
							<input type="text" id="urnm" name="username" placeholder="Username">
							<input type="password" id="pass" name="current-password" placeholder="Password">
							<button type="submit" name="mlogin">Log In</button>

						</form>
					<button id="back" ><i class="fa fa-rotate-left" style="font-size:36px;"></i></button>
				</div>

				<!--<div id="shows2" class="side back2">
					<div class="forms">
						<form id="frm" action="php/loginAuth.php" method="post">
							<input type="text" id="urnm" name="username" placeholder="Username">
							<input type="password" id="pass" name="current-password" placeholder="Password">
							<input type="text" id="name" name="mname" placeholder="Member Name">
							<input type="text" id="mid" name="mid" placeholder="Emp Id">
							<button type="submit" name="mSignup">Sign Up</button>

						</form>
					<button id="back" ><i class="fa fa-rotate-left" style="font-size:36px;"></i></button>
				</div>
			</div>-->






			</div>

		</div>



		<!--

	-->
	</div>


</div>

<div style="width: 100%; height: 100vh;background:white;" id="next">

	<div style="width: 80%; height: auto;margin: auto;margin-top:100px;">
		<h1 style="letter-spacing: 2px; width: 100%; height: auto;text-align: center;color:#aaa;font-family: 'Roboto', sans-serif;">About Us</h1>



		<div style="width: 100%; display: flex;flex-direction: row; margin-top: 70px;">
		<div style="width: 50%;height: 450px;background:;">

		<div style="width:20vw; height: 20vw;background: #ccc;position: absolute;"></div>
		<div style="width: 20vw; height: 20vw;background:url('images/imgbg.png');background-position: center;background-size:cover; border: 2px solid yellow; position: absolute;transform: translateX(40px) translateY(40px);"></div>

		</div>
		<div style="width: 50%;height: 450px;background: white;position: relative;">

		<p style="width:80%;text-align: justify;margin: auto;font-size: 1.5vw;padding-left: 10px; font-family: 'Playfair Display', serif;">Basant Bahar Restaurant is one of the fastest growing hospitality businesses in India. Our success stems from a simple principle: best value for our clients. We believe in building lifelong relationships through customized services, constant innovations, focus on quality and providing value for money.
		</p>
		<div style="position: absolute;bottom: 0; background:;width: 100%;text-align: right;"><a style="text-transform: none;margin-right: 20px;" href=""><i class='fab fa-facebook-f' style='font-size:36px; color:black;'></i></a><a href="" style="text-transform: none;margin-right: 20px;"><i class='fab fa-whatsapp' style='font-size:36px; color:black;'></i></a></div>
		</div>
		</div>
	</div>
</div>



<div style="width: 100%; height: auto;background:url('images/ourclient.png');background-size: cover;background-position: center;background-attachment: fixed;" id="next">
<div style="width: 100%;height:100%; margin: 0;z-index: -1; background: black;opacity: .6;position: absolute;">
	</div>
	<div style="width: 100%; height:100vh;margin: auto;margin-top:100px;">
		<h1 style="background:#ff8800 ; width: 100%; height: 15vh;line-height: 8vw; letter-spacing: 2px; text-align: center;color:white;font-family: 'Roboto', sans-serif;">Our Clients</h1>



		<div style="width: 70%;margin: auto; margin-top: 70px;text-align: center;">
			<img src="images/NTPCLogo.png" class="imgalign">
			<img src="images/THDCIL.png"  class="imgalign">
			<img src="images/images.jpg"  class="imgalign">
			<img src="images/download.jpg"  class="imgalign">
			<img src="images/download.png" class="imgalign">
			<img src="images/SECL.jpg"  class="imgalign">
			<img src="images/logo.png" class="imgalign">
		</div>

	</div>
</div>
<div style="width: 100%; height: 100vh;background: red;position: relative;" id="next">

	<div style="width: 100%;height: auto;background: #ff8800; text-align: center; ">
		<h1 style="background:#ff8800 ; width: 100%; height: auto;line-height: 80px; letter-spacing: 2px; text-align: center;color:white;font-family: 'Roboto', sans-serif;">Contact Us</h1>
		<p style="text-align: center;font-size: 1.5vw;line-height:30px;  font-family: 'Roboto', sans-serif;">
			<strong>Email</strong><br>

			sdjaiswal812@gmail.com<br>

			<strong>Contact</strong> <br>

			9450162775, 9454681976<br>

			<strong>Address</strong> <br>

			Shop No. 07, Sopping Complex, Kakri , <br>Sonebhadra, Uttar Pradesh 231224.

		</p>


	</div>
	<div style="width: 100%;height: auto;">
	<div style="width: 100%; height: 40vh;background: url('images/footer2.png');background-size: cover;background-position: center; ">
		<div style="width: 100%; height: 40vh;background: black;opacity: .9; ">
		<div class="footer_partition" style="font-family: 'Roboto', sans-serif;">
			<a href="">Services</a>
			<a href="">Contact Us</a>
			<a href="">Clients</a>
			<a href="">Privacy</a>
		</div>
		<div class="footer_partition" style="font-family: 'Roboto', sans-serif;">
			<a href="">NCL Project</a>
			<a href="">THDC India </a>
			<a href="">NTPC</a>
			<a href="">OCPL</a>
			<a href="">SECL Project</a>
			<a href="">UPRVUNL</a>
		</div>
		<div class="footer_partition"></div>
	</div>
	</div>
	<div style="width: 100%; height: 15vh;background: gray; border:none;border-top:2px solid white;  ">
		<p style=" color: #ccc;margin: auto;width: 95%;line-height: 50px;margin-top: 50px;">&copy; Copyright <strong>Basant Bahar Restaurant Specilist of Hospitality</strong> 2019.</p>
	</div>
	</div>

</div>

</body>
</html>

<?php
}
?>