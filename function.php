<?php

    // session_start();
    
    include "connect.php";

    function tampilDataMahasiswa() {
        $query = mysql_query("select * from mahasiswa");
        while ($hasil = mysql_fetch_array($query)) {
            echo "    <tr>
            <td>" . $hasil['nim'] . "</td>
            <td>" . $hasil['nama'] . "</td>
            <td class='text-center'>" . $hasil['angkatan'] . "</td>
            <td class = 'text-center'>
            <a class = 'btn btn-success' href = 'edit.php?nim=" . $hasil['nim'] . "'>
                Ubah
            </a>
            </td>
            <td class = 'text-center'><a href = 'hapus.php?nim=" . $hasil['nim'] . "' class = 'btn btn-danger'>Hapus</a></td>
            </tr>";
        }
    }

    function tampilDataBuku() {
        $query = mysql_query("select * from buku");
        while ($hasil = mysql_fetch_array($query)) {

            // echo "    <tr>
            // <td>" . $hasil['nim'] . "</td>
            // <td>" . $hasil['nama'] . "</td>
            // <td class='text-center'>" . $hasil['angkatan'] . "</td>
            // <td class = 'text-center'>
            // <a class = 'btn btn-success' href = 'edit.php?nim=" . $hasil['nim'] . "'>
            //     Ubah
            // </a>
            // </td>
            // <td class = 'text-center'><a href = 'hapus.php?nim=" . $hasil['nim'] . "' class = 'btn btn-danger'>Hapus</a></td>
            // </tr>";
        }
    }


    function tambahData($nim, $nama, $angkatan) {
        mysql_query("insert into mahasiswa (nim,nama,angkatan) values ('" . $nim . "','" . $nama . "','" . $angkatan . "')");
    }

    //baca data untuk form edit
    function bacaData($type, $nim) {
        $data = mysql_query("select * from mahasiswa where nim = '$nim'");
        while ($hasil = mysql_fetch_array($data)) {
            if ($type == 'nama') {
                echo $hasil['nama'];
            } else if ($type == 'angkatan')
                echo $hasil['angkatan'];
        }
    }

    function editData($nim, $nama, $angkatan) {
        mysql_query("update mahasiswa set nama='$nama', angkatan='$angkatan' where nim='$nim'");
    }

    function hapusData($nim){
        mysql_query("DELETE FROM mahasiswa WHERE nim='$nim'");
    }

    function loginAdmin($username, $password){
        $query = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'"); 
        $result = mysql_num_rows($query);
        return $result;
    }

    function getDataLevel($username, $password){
        $query = mysql_query("SELECT level FROM admin WHERE username='$username' AND password='$password'"); 
        $result = mysql_fetch_row($query);
        return $result[0];
    }

    function getVal($table, $col, $key){
        $query = mysql_query("SELECT * FROM $table WHERE $col='$key'"); 
        $result = mysql_num_rows($query);
        return $result;
    }

    function masukanPinjam($nimMahasiswa, $idKoleksi, $date, $datePlus){
        $query = mysql_query("INSERT INTO pinjam (nimMahasiswa, idKoleksi, tanggalPinjam, tanggalHarusKembali) VALUES ('$nimMahasiswa', '$idKoleksi', '$date', '$datePlus')");
        return $query;
    }

    function calculateDate($setDate){
        $h = 2;
        $i = 1;
        $j = 'on';

        while ($j != 'off') {
            $newSetDate = strtotime ( '+'.$i.' day' , strtotime ( $setDate ) ) ;
            $newSetDate = date ( 'Y-m-j' , $newSetDate );
            if (matchDate($newSetDate) == 1) {
                $i++;
            } else {
                if ($h != 0) {
                    $i++;
                    $h--;
                } else {
                    $j = 'off';
                }
            }
            $newSetDate = strtotime ( '+'.$i.' day' , strtotime ( $setDate ) ) ;
            $newSetDate = date ( 'Y-m-j' , $newSetDate );
            
        }
        return $newSetDate;
    }

    function matchDate($date){
        $query = mysql_query("SELECT * FROM holyday WHERE holyday = '$date'");
        if (mysql_num_rows($query) == 1) {
            return 1;
        } else {
            return 0;
        }
    }
?>
