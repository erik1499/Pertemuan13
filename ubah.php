<?php

require_once 'functions.php';
  // cek apakah tombol sunmit udah di pake apa belum
 
  //Ambil data dari URL

  $id = $_GET["Id"];

  

  //query data mahasiswa id

  $mhs= mysqli_query($conn, "SELECT * FROM datamaba WHERE Id = '$id' ");

  $mhs = mysqli_fetch_assoc($mhs);
  if (isset($_POST["submit"]) ) {


// apakah data berhasil di ubah  apa tidak
        if (ubah($_POST, $_GET['Id']) > 0) {
            echo"   
            <script>
alert('data berhasil di Ubah!!');
document.location.href ='index.php';
</script>
               
            ";
        }else {
            echo" 
            <script>
            alert('data gagal di Ubah!!');
            document.location.href ='index.php';
            </script>
            
        ";
        }

}



 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mahasiswa</title>
</head>
<body>
            <h1> Ubah Data Mahasiswa</h1>

        <form action="" method="post"  >

        <ul>
            <li>
                <label for="nama">Nama: </label>
                 <input type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>" >
            </li>
            <li>
                <label for="nim">NIM: </label>
                 <input type="text" name="nim" id="nim" required value="<?= $mhs['nim']; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                 <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                 <input type="text" name="email" id="email" required value="<?= $mhs['email']; ?>"> 
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                 <input type="text" name="gambar" id="gambar" required value="<?= $mhs['gambar']; ?>">
            </li>
            <li > <button type="sumbit" name="submit">ubah Mahasiswa</button>
        </li>
        </ul>


        </form>



</body>
</html>