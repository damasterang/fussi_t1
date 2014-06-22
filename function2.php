<?php

class database {

//properties
    private $server;
    private $username;
    private $password;
    private $database_name;


//constructor
    function __construct($server, $username, $password, $database_name) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->database_name = $database_name;
        //variabel $this itu built in variabel untuk mengakses properties atau method yang ada di class tersebut.
    }

//method koneksi
    function connectMySQL() {
        mysql_connect($this->server, $this->username, $this->password);
        mysql_select_db($this->database_name);
    }
    
    function tampilData() {
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
}
