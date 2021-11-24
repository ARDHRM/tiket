<?php

if(isset($_POST['submit'])){
	
	$idKelas = $_POST['idKelas'];
	$namaKelas = $_POST['namaKelas'];
	$harga = $_POST['harga'];
	
	$cek = mysql_num_rows(mysql_query("SELECT * FROM kelasPsw WHERE idKelas = '$idKelas'"));
	
	if($cek==0){
		
		$table = "INSERT INTO kelasPsw SET"; 
		$field= "namaKelas = '$namaKelas',
				   harga = '$harga'";	
		$where = "";	
	}else{ 
		$table = "UPDATE kelasPsw SET";	
		$field= "namaKelas = '$namaKelas',
				 harga = '$harga'";	
		$where = "WHERE idKelas = '$idKelas'"; 
	}
	
	mysql_query("$table $field $where")or die ('Error!!'.mysql_error());
	
	echo "<script>window.location.href='?page=kelas';</script>";
	exit;
}

if(isset($_GET['delidKelas'])){
	
	mysql_query("DELETE FROM kelasPsw WHERE idKelas = '$_GET[delidKelas]'");

	echo"<script>
		alert('Data terhapus');
		window.location.href='?page=kelas';
		</script>";
}

$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kelasPsw WHERE idKelas = '$_GET[idKelas]'"));
?>

<form method="POST">
<table align="center">
	<tr>
		<td><input type="hidden" name="idKelas" value="<?=$tampil['idKelas']?>" readonly /></td>
	</tr>
	<tr>
		<td>Nama Kelas</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="namaKelas" value="<?=$tampil['namaKelas']?>" required/></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="harga" value="<?=$tampil['harga']?>" required/></td>
	</tr>
	<tr>
		<td colspan=3 align='center'>
        
        <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Simpan"/> 
        <a href="?page=kelas"><input type="button" class="btn btn-warning btn-sm" name="batal" value="Batal"/></a><!--tombol batal-->
        </td>
	</tr>
</table>
</form>
<?php

$select = 'SELECT * FROM kelasPsw ORDER BY idKelas ASC';

$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());

if(mysql_num_rows($resultselect)==0){
	echo"<center>Data tidak tersedia!</center>";
}else{

echo "<table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='50%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'>No</th>
	<th bgcolor='silver'>Nama Kelas</th>
	<th bgcolor='silver'>Harga</th>
	<th bgcolor='silver'></th>
</tr>";
$no=0; 

while($row = mysql_fetch_array($resultselect)){
extract($row); 

echo "<tr>
	<td align='center'>".$no=1+$no."</td>
	<td>".$namaKelas."</td>
	<td align='right'>Rp. ".number_format($harga,2,',','.')."</td>
	<td align='center'><a href='?page=kelas&idKelas=$idKelas' class='btn btn-info btn-sm'>Edit</a>
	<a href='?page=kelas&delidKelas=$idKelas' class='btn btn-danger btn-sm'>Hapus</a></td>
</tr>";
}
echo"</table>";
}
?>
