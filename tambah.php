<?php

require_once 'functions.php';
  // cek apakah tombol sunmit udah di pake apa belum
 

  if (isset($_POST["submit"]) ) {

  
  

// apakah data berhasil ditambahka apa tidak
        if (tambah($_POST)) {
            echo"   
            <script>
alert('data berhasil di tambahkan!!');
document.location.href ='index.php';
</script>
               
            ";
        }else {
            echo" 
            <script>
            alert('data gagal di tambahkan!!');
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
            <h1> Tambah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data" >

        <ul>
            <li>
                <label for="nama">Nama: </label>
                 <input type="text" name="nama" id="nama" required >
            </li>
            <li>
                <label for="nim">NIM: </label>
                 <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                 <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="email">Email: </label>
                 <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                 <input type="file" name="gambar" id="gambar" required>
            </li>
            <li > <button type="sumbit" name="submit">Tambah Mahasiswa</button>
        </li>
        </ul>


        </form>



</body>
</html>