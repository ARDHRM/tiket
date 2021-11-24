<?php
//-apabila tombol submit di set atau ditekan
//-maka akan malakukan aksi didalam isset tersebut.
if(isset($_POST['submit'])){
    //- deklarasi variable POST
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $level = 'user';
    //mengecek berapa jumlah data yang dipilih dalam query
    $cek = mysql_num_rows(mysql_query("SELECT * FROM user WHERE iduser = '$iduser'"));
    //untuk mengecek apakah jumlah banyaknya data yang dipilih(SELECT) = 0
    //jika jumlahnya = 0 maka akan melakukan INSERT data, 
    if($cek==0){
        //membuat variable table, field, dan where yang akan digunakan untuk fungsi
        //query database antara insert data atau update data,
        //sehingga tidak perlu melakukan penulisan berulang ulang
        $table = "INSERT INTO user SET"; //tabel yang akan diinsertkan
        $field= "username = '$username',
                  fullname = '$fullname',
                   password = '$password',
                   level = '$level'";   // field yang akan diinsertkan dengan nilai POST
        $where = "";    // variable WHERE diisi nilai kosong
    }else{ //jika tidak maka akan melakukan UPDATE data
        $table = "UPDATE user SET"; //tabel yang akan diupdate
        $field= "username = '$username',
                 fullname = '$fullnamename',
                 password = '$password'
                 level = '$level'"; //nilai field yang akan diupdate
        $where = "WHERE iduser = '$iduser'"; //dimana IDfield = idfield POST
    }
    //Query yang akan dijalankan dengan memanggil variale (table, field, where)
    mysql_query("$table $field $where")or die ('Error!!'.mysql_error());
  
    echo "<script>alert('Berhasil Daftar, Silahkan Login')</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AR`CORE REGISTER</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

      <BR><BR>
        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form method="POST"">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="fullname" placeholder="Nama kamu" required/>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" required/>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required/>
            </div>

            <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Daftar"/>     <a href="index.php"> <input type="button" class="btn btn-warning btn-sm" name="batal" value="Batal"/></a>

        </form>
            
        </div>

        <div class="col-md-6">
        </div>

    </div>
</div>
<BR><BR><BR><BR>
</body>
</html>