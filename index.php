<?php
 
 //koneksi ke data base

require_once 'functions.php';  // untuk memanggil data base

$mahasiswa = query("SELECT * FROM mahasiswa ");
// ambil data dari mahasiswa / query data mahasiswa

if (isset($_POST["cari"])) {

    $mahasiswa = cari($_POST["keyword"]);
}


// $result = mysqli_query($conn, "SELECT * FROM datamaba" );
// if (!$result) {
//     echo mysqli_error($conn);
// }

// ambil data (fetc)  maba dari objct result
// mysqli_fetc_row()  menggembalikan array numerik
// mysqli_fetc_assoc() menggembalikan array associative
// mysqli_fetc_array() menggembalikan keduanya 
// mysqli_fetc_object()

// engga ush pake while juga bisa

// while ($mhs = mysqli_fetch_assoc($result)) (


// var_dump($mhs ) )

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1> Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa Baru</a>

<br> <br>
    <table border="1" cellpadding="10" callspacing="0">

    <form action="" method="post">
    
     <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Nama..." autocomplete="off">
     <button type="submit" name="cari">Cari!</button>
    
    </form>

    <br> <br>
        
    <tr>
            <th>No. </th>
            <th>Aksi </th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Alamat</th>

        </tr> 


        <?php $i=1; ?>
        <?php foreach (  $mahasiswa as $row){ ?>  
        <tr>
       
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"];?>"onclick="return confirm('Apakah anda Ingin menghapus?'); ">Hapus</a>

            </td>
            <td><img src="img/<?=  $row["gambar"]; ?>" width="50"></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["alamat"];?></td>
        </tr>
        <?php $i++;?>
        <?php } ?>
    </table>
</body>
</html>