<?php
session_start();
require_once 'connection.php';
if (isset($_POST['mlogin'])) {

	$username = $_POST["username"];
	$pass = $_POST["current-password"];

	$query = "SELECT `user_id`, `name`, `pass` FROM `user` WHERE `name` = '$username' AND  `pass` = '$pass'";

	$run = mysqli_query($conn, $query);
	$row = mysqli_num_rows($run);
	if ($row > 0) {
		$_SESSION["username"] = $username;

		header('location: ../pages/Billingsystem.php');
	} else {
		?>
<script>
			window.alert('E-mail id and Password invalid');
			window.location.href = "../index.php";
</script>
<?php
}
}
?>