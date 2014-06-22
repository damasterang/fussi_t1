<!DOCTYPE html>
<html>
	<head>
		<title>judul</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/myJs.js"></script>
	</head>
	<body>

<?php 

session_start();

if (isset($_SESSION['username'])) {

?>

<div class="wrapper">

	<div class="sishu peminjaman">
		<h1>Peminjaman</h1>
	</div>
	<?php 

		if (isset($_GET['errorMsg'])) {
			if ($_GET['errorMsg'] == 1) {
				echo "<div class='errorLogin'>nim or id collection null</div>";
			} elseif($_GET['errorMsg'] == 2){
				echo "<div class='errorLogin'>fill the form first</div>";
			} elseif($_GET['errorMsg'] == 3){
				echo "<div class='errorLogin'>your transaction is succeed</div>";
			}
		}

	?>
			<form action="process.php?a=peminjaman" method="post">
						<table>
							<tr>
								<td>
									<div class="label">Nim</div>
								</td>
								<td>
									<input type="text" name="nim"/>
								</td>
							</tr>
							<tr>
								<td>
									<div class="label">Id Koleksi</div>
								</td>
								<td>
									<input type="text" name="idKoleksi"/>
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
			<a class="logout" href='logout.php'>logout</a>
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

<?php 
} else {
	header("location:login.php?errorMsg=3");
}

?>