<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/myJs.js"></script>

	</head>
	<body>
		<div class="wrapper">
			<div class="sishu">
				<h1>Login</h1>
			</div>
			<?php 

				if (isset($_GET['errorMsg'])) {
					if ($_GET['errorMsg'] == 1) {
						echo "<div class='errorLogin'>username and password doesn't match</div>";
					} elseif($_GET['errorMsg'] == 2){
						echo "<div class='errorLogin'>fill the login form first</div>";
					} elseif($_GET['errorMsg'] == 3){
						echo "<div class='errorLogin'>you must login first</div>";
					}
				}

			?>
			<form action="process.php?a=login" method="post">
				<table>
					<tr>
						<td>
							<div class="label">Username</div>
						</td>
						<td>
							<input type="text" name="username"/>
						</td>
					</tr>
					<tr>
						<td>
							<div class="label">Password</div>
						</td>
						<td>
							<input type="password" name="password"/>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="center">
							<input type="submit" name="submit" value="Submit" />
							<input type="reset" name="reset"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
<?php 

	if (isset($_GET['errorMsg'])) {
		echo "<script type='text/javascript'>
		$('.errorLogin').fadeIn();
		$('.errorLogin').delay(5000).fadeOut();
		</script>";
	}

?>