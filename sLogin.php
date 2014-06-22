<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	</head>
	<body>
<?php 

// include_once 'connect.php'; 

?>

<?php 

session_start();

if (isset($_SESSION['username'])) {
	echo "<div class='wrapper'>";
	echo "<h1 class='sishu welcome'>Welcome ".$_SESSION['username']."</h1></br>";

?>
				<div class="wrapperPilih">
					<!-- <div class="wrapperPilihPinjam"> -->
						<a id="peminjaman" class="pilihan" href="peminjaman.php">Peminjaman</a>
					<!-- </div> -->
					<!-- <div class="wrapperPilihKembali"> -->
						<a id="pengembalian" class="pilihan" href="pengembalian.php">Pengembalian</a>
					<!-- </div> -->
				</div>
			<a class="logout" href='logout.php'>logout</a>
		</div>

		<!-- <form action="process.php?a=pinjam" method="post">
			<label for="nimMahasiswa">Nim Mahasiswa : </label>
				<input type="text" name="nimMahasiswa"/></br>
			<label for="idKoleksi">Id Koleksi : </label>
				<input type="text" name="idKoleksi"/></br>
			<label for="tanggal">Tanggal : </label>
				<input type="text" name="tanggal"/></br>
			<input type="submit" value="submit" name="submit"/>
		</form> -->

<?php

} else {
	header("location:login.php?errorMsg=3");
	exit();
}

?>
	</body>
</html>