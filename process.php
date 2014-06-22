<?php
		
	
	include "function.php";


	if ($_GET['a'] == 'login') {

		if (isset($_POST['username']) && isset($_POST['password'])) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];

			if ($username == '' || $password == '') {
				header('location: login.php?errorMsg=2');
				exit();
			}
			
			session_start();

			$cek = loginAdmin($username, $password);

			if ($cek >= 1) {
				$level = getDataLevel($username, $password);
				$_SESSION['levelAdmin'] = $level;
				$_SESSION['username'] = $username;
				header("location:sLogin.php");
				echo "Welcome ".$_SESSION['username']."</br>";
				// echo "ada <a href='sLogin.php'>sLogin</a>";
			} else {
				header('location: login.php?errorMsg=1');
			}
			
		} else {
			header('location: login.php?errorMsg=2');
		}
	} elseif ($_GET['a'] == 'peminjaman') {
		
		if (isset($_POST['nim']) && isset($_POST['idKoleksi'])) {

			$nimMahasiswa = $_POST['nim'];
			$idKoleksi = $_POST['idKoleksi'];

			if ($nimMahasiswa == '' || $idKoleksi == '') {
				header('location: peminjaman.php?errorMsg=2');
				exit();
			}

			session_start();

			$cekMahasiswa 	= getVal('mahasiswa', 'nim' , $nimMahasiswa);
			$cekKoleksi 	= getVal('koleksi', 'id' , $idKoleksi);

			echo "$cekMahasiswa";


			if ($cekMahasiswa > 0) {
				if ($cekKoleksi > 0) {


					$date = date('Y-m-j');
					$newDate = calculateDate($date);
					
					$masukan = masukanPinjam($nimMahasiswa, $idKoleksi, $date, $newDate);

					header('location:peminjaman.php?errorMsg=3');

				}
				else {
					header("location:peminjaman.php?errorMsg=1");
				}
			} 
			else {
				header("location:peminjaman.php?errorMsg=1");
			}

		} else {
			header("location:peminjaman.php?errorMsg=2");
		}

	}

?>