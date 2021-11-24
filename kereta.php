
<?php

if(isset($_POST['submit'])){
	
	$idKA = $_POST['idKA'];
	$namaKA = $_POST['namaKA'];
	$tanggalBerangkat = $_POST['tanggalBerangkat'];
	$tanggalTiba = $_POST['tanggalTiba'];
	$jamBerangkat = $_POST['jamBerangkat'];
	$jamTiba = $_POST['jamTiba'];
	$dari = $_POST['dari'];
	$ke = $_POST['ke'];
	$idKelas = $_POST['idKelas'];
	
	$cek = mysql_num_rows(mysql_query("SELECT * FROM kereta WHERE idKA = '$idKA'"));
	
	if($cek==0){
		
		$table = "INSERT INTO kereta SET";   
		$field= "namaKA = '$namaKA',
				 tanggalBerangkat = '$tanggalBerangkat',
				 tanggalTiba = '$tanggalTiba',
				 jamBerangkat = '$jamBerangkat',
				 jamTiba = '$jamTiba',
				 dari = '$dari',
				 ke = '$ke',
				 idKelas = '$idKelas'
				 ";	
		$where = "";	
	}else{	
		$table = "UPDATE kereta SET";	
		$field= "namaKA = '$namaKA',
				 tanggalBerangkat = '$tanggalBerangkat',
				 tanggalTiba = '$tanggalTiba',
				 jamBerangkat = '$jamBerangkat',
				 jamTiba = '$jamTiba',
				 dari = '$dari',
				 ke = '$ke',
				 idKelas = '$idKelas'
				 ";	
				 
		$where = "WHERE idKA = '$idKA'"; 
	}
	
	mysql_query("$table $field $where")or die ('Error!!'.mysql_error());
	
	echo "<script>window.location.href='?page=kereta';</script>";
	exit;
}

if(isset($_GET['delidKA'])){
	
	mysql_query("DELETE FROM kereta WHERE idKA = '$_GET[delidKA]'");
	
	echo"<script>
		alert('Data terhapus');
		window.location.href='?page=kereta';
		</script>";
}

$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kereta WHERE idKA = '$_GET[idKA]'"));
?>
<form method="POST">

<table align="center">
	<tr>
		<td><input type="hidden" name="idKA" class="form-control" value="<?=$tampil['idKA']?>" readonly /></td>
	</tr>
	<tr>
		<td>Nama Kereta</td>
		<td>:</td>
		<td><input type="text" name="namaKA" class="form-control" value="<?=$tampil['namaKA']?>" required/></td>
	</tr>
	<tr>
		<td>Tanggal Berangkat</td>
		<td>:</td>
		<td><input type="date" name="tanggalBerangkat" class="form-control" value="<?=$tampil['tanggalBerangkat']?>" required/></td>
	</tr>
    <tr>
		<td>Tanggal Tiba</td>
		<td>:</td>
		<td><input type="date" name="tanggalTiba" class="form-control" value="<?=$tampil['tanggalTiba']?>" required/></td>
	</tr>
    <tr>
		<td>Jam Berangkat</td>
		<td>:</td>
		<td><input type="time" name="jamBerangkat" class="form-control" value="<?=$tampil['jamBerangkat']?>" required/></td>
	</tr>
    <tr>
		<td>Jam Tiba</td>
		<td>:</td>
		<td><input type="time" name="jamTiba" class="form-control" value="<?=$tampil['jamTiba']?>" required/></td>
	</tr>
    <tr>
		<td>Dari</td>
		<td>:</td>
		<td><input type="text" name="dari" class="form-control" value="<?=$tampil['dari']?>" required/></td>
	</tr>
    <tr>
		<td>Ke</td>
		<td>:</td>
		<td><input type="text" name="ke" class="form-control" value="<?=$tampil['ke']?>" required/></td>
	</tr>
    <tr>
		<td>Kelas</td>
		<td>:</td>
		<td><select name="idKelas" class="form-control"> 
				<option value=""></option>
					<?
					$kls=mysql_query("select * from kelas");
					while($isikls=mysql_fetch_array($kls)){
						if($isikls['idKelas']==$tampil['idKelas'])
						    echo "<option value='".$isikls['idKelas']."' selected>".$isikls['namaKelas']." - ".number_format($isikls['harga'],0,',','.')."</option>";
						else
							echo "<option value='".$isikls['idKelas']."'>".$isikls['namaKelas']." - ".number_format($isikls['harga'],0,',','.')."</option>";
					}
					?>
			</select></td>
	</tr>
	<tr>
		<td colspan=3 align='center'><input class="btn btn-primary btn-sm" type="submit" name="submit" value="Simpan"/>
        <a href="?page=kereta"><input type="button" class="btn btn-warning btn-sm" name="batal" value="Batal"/></a></td>
	</tr>
</table>
</form>
<?php

$select = 'SELECT * FROM kereta ORDER BY idKA ASC';

$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
if(mysql_num_rows($resultselect)==0){ 
	echo"<center>Data tidak tersedia!</center>"; 
}else{	

echo "<table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'>No</th>
	<th bgcolor='silver'>Nama Kereta</th>
	<th bgcolor='silver'>Jadwal Berangkat</th>
	<th bgcolor='silver'>Jadwal Tiba</th>
	<th bgcolor='silver'>Dari</th>
	<th bgcolor='silver'>Ke</th>
	<th bgcolor='silver'>Harga (Kelas)</th>
	<th bgcolor='silver'></th>
</tr>";
$no=0; 
while($row = mysql_fetch_array($resultselect)){ 
extract($row); 

$lihat=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE idKelas = '$idKelas'"));

echo "<tr align='center'>
	<td align='center'>".$no=1+$no."</td>
	<td>".$namaKA."</td>
	<td>".$tanggalBerangkat." - ".$jamBerangkat."</td>
	<td>".$tanggalTiba." - ".$jamTiba."</td>
	<td>".$dari."</td>
	<td>".$ke."</td>
	<td>".$lihat['namaKelas']." - ".number_format($lihat['harga'],0,',','.')."</td>
	<td align='center'><a href='?page=kereta&idKA=$idKA' class='btn btn-info btn-sm'>Edit</a>
	<a href='?page=kereta&delidKA=$idKA' class='btn btn-danger btn-sm'>Hapus</a></td>
</tr>";
}
echo"</table>";
}
?>
