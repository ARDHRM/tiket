<?php
session_start();
include('cekadmin.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>ARIF-Travels.com - DASHBOARD MANAGER</title>

		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin DashBoard</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="haladmin.php">
				<?php
				
                echo "<img style='height: 30px; margin-top: -5px;' src='assets/img/icon/arif.png' class='img-circle'>";

				?> 
				<div class="pull-left">
				<p style="margin: -25px 40px 10px;">Welcome <i><?php echo $level; ?></i></p>
				</div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
				<li></i></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=kereta">Jadwal Kereta</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=kelas">Kelas Kereta</a></li>
            </ul>

             <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=pesawat">`Jadwal Pesawat`</a></li>
                -
            </ul>
        

            <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=kelasPsw">`Kelas Pesawat`</a></li>
            </ul>
         

            <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=datapesanPsw">`Pemesanan Pesawat`</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li></i></li>
                <li><a href="?page=editUser">Ubah User</a></li>
            </ul>
        </div>
    </div>
</nav>
		
<div class="container" style="margin-top:40px">

   <h1>Hallo Selamat Datang <small><?php echo $fullname;?></small></h1><br>
         <p>Anda telah login sebagai manager, dan anda sekarang ada di dashboard manager.</p><br /> 
 
         <?php         

    
       include ("koneksi.php");
    if($_GET['page']==""){
        include "datapesan.php";
    }elseif($_GET['page']=="login"){
        include"login.php";
    }elseif($_GET['page']=="kelas"){
        include"kelas.php";  
    }elseif($_GET['page']=="kelasPsw"){
        include"kelasPsw.php";
    }elseif($_GET['page']=="kereta"){
        include"kereta.php";
    }elseif($_GET['page']=="datapesanPsw"){
        include"dataPesanPsw.php";
    }elseif($_GET['page']=="editUser"){
        include"editUser.php";
    }elseif($_GET['page']=="pesawat"){
        include"pesawat.php";
    }

    

                   ?>
</div>				

</body>
</html>