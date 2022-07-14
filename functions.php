<?php
$conn = mysqli_connect("localhost" , "root", "", "dasarphp");
//   $servername = "localhost";
//  $username = "root";
//  $password = "";
//  $dbname = "dasarphp";
//  try {
//    $conn = new PDO("mysql:host=$servername;dbname=dasarphp",s $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//  } catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//  }
 
function query($query){
    global $conn;
    $result= mysqli_query( $conn , $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
 }

 function tambah($data){
    global $conn;

//     $nama= $data["nama"];
//     $nim= $data["nim"];
//     $email= $data["email"];
//     $jurusan= $data["jurusan"];
//     $gambar= $data["gambar"];

    $nama= htmlspecialchars($data["nama"]);
    $nim= htmlspecialchars($data["nim"]);
    $email= htmlspecialchars($data["email"]);
    $jurusan= htmlspecialchars($data["jurusan"]);
    
    //Upload Gambar
    $gambar = upload(); 
    if (!$gambar) {
        
    }
    

    $query = "INSERT INTO datamaba (nama, nim, email, jurusan, gambar)
            VALUES
            ('$nama','$nim','$email','$jurusan','$gambar')
                    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Fungsi Upload

function upload(){

        $namafile= $_FILES['gambar']['name'];
        $ukuranfile = filesize($_FILES['gambar']['tmp_name']);
        // $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];
        

        //  cek apakah tidak ada gambar yang di upload

        if ($error === 4 ) {
            echo "<script>
            alert(' pilih gambar terlebih dahulu!');
            </script>";

            return false;
        }

        // chek apakah yang diupload  adalah gambar

         $extensiGambarValid = ['jpg','jpeg','png','raw'];
            $extensiGambar = explode('.', $namafile);
    // extensi explode pada php adalah untuk memecah sebuah string menjadi array 
            $extensiGambar = strtolower(end($extensiGambar));
                if(!in_array($extensiGambar, $extensiGambarValid)){
                    
                   echo" <script> alert(' Yang anda upload bukan gambar!');
                    </script>";
        
                    return false;
                } 
                
    // cek jika ukuranya terlalu besar
             if($ukuranfile > 1000000 ) {
              
                echo" <script>
                 alert('ukuran gambar terlalu besar!');
                </script>";

    
                return false;
             }
           
            
        
}




// fungsi hapus

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM datamaba WHERE Id = $id ");
    return mysqli_affected_rows($conn);
}

function ubah($data, $id) 
{
    global $conn;

    $nama= htmlspecialchars($data["nama"]);
    $nim= htmlspecialchars($data["nim"]);
    $email= htmlspecialchars($data["email"]);
    $jurusan= htmlspecialchars($data["jurusan"]);
    $gambar= htmlspecialchars($data["gambar"]);

    mysqli_query($conn, "UPDATE datamaba SET nama = '$nama', nim = '$nim', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE Id = '$id'");
    return mysqli_affected_rows($conn);
}


function cari($keyword){
  
    $query = "SELECT * FROM datamaba 
                        WHERE 
                       nama LIKE '%$keyword%' OR
                       nim LIke '%$keyword%' OR
                       jurusan LIKE '%$keyword%'
                        ";
                        return query($query);
}
?>