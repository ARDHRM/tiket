<?


if(isset($_POST['submit'])){ 
	$namaPemesan = $_POST['namaPemesan'];
	$alamat = $_POST['alamat'];
	$noTelp = $_POST['noTelp'];
	$dewasa = $_POST['dewasa'];
	$anak = $_POST['anak'];

		$table = "INSERT INTO pesan SET";
		$field= "namaPemesan = '$namaPemesan',
				 alamat = '$alamat',
				 noTelp = '$noTelp',
				 dewasa = '$dewasa',
				 anak = '$anak',
				 idKA = '$_GET[getidKA]'
				 ";
	
	mysql_query("$table $field")or die ('Error!!'.mysql_error());

	$max = mysql_fetch_array(mysql_query("SELECT max(idPesan) as idPesan FROM pesan"));

	echo "<script>window.location.href='detailPesan.php?getidKA=$_GET[getidKA]&getidPesan=$max[idPesan]';</script>";
	exit;
}


if(isset($_REQUEST['pilih'])){
	echo"<script>
		window.location.href='?getidKA=$_POST[pilih]';
		</script>";
}

if(isset($_REQUEST['getidKA'])){ 
$tampil = mysql_fetch_array(mysql_query("SELECT * FROM kereta WHERE idKA = '$_GET[getidKA]'"));
?>
<center><h4>&raquo; Form Registrasi &laquo;</h4>
Silahkan Masukkan biodata diri anda dengan benar!</center>
<form method="POST" action="">
<table border="0" align="center" width="70%" style="border : 1px solid black;border-spacing : 1px;">
  <tr>
    <th align="right">Nama Kereta</th>
    <th>:</th>
    <td><?=$tampil['namaKA']?></td>
    <th align="right">Dari</th>
    <th>:</th>
    <td><?=$tampil['dari']?></th>
  </tr>
  <tr>
    <th align="right">Jadwal Berangkat</th>
    <th>:</th>
    <td><?=$tampil['tanggalBerangkat']." ".$tampil['jamBerangkat']?></td>
    <th align="right">Ke</th>
    <th>:</th>
    <td><?=$tampil['ke']?></td>
  </tr>
  <tr>
    <th align="right">Jadwal Tiba</th>
    <th>:</th>
    <td><?=$tampil['tanggalTiba']." ".$tampil['jamTiba']?></td>
    <th align="right">Harga (Kelas)</th>
    <th>:</th>
    <td><?
    $isikls=mysql_fetch_array(mysql_query("select * from kelas where idKelas='$tampil[idKelas]'"));
	echo $isikls['namaKelas']." - ".number_format($isikls['harga'],0,',','.');
	?></td>
  </tr>
</table>

<table align="center">
<tr>
		<td>Nama Pemesan</td>
		<td>:</td>
		<td><input type="text" name="namaPemesan" class="form-control" required/></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><input type="text" name="alamat" size="40" class="form-control" required/></td>
	</tr>
    <tr>
		<td>No Telp<br><sub><font color="#000099">*Bisa dihubungi saat ini</font></sub></td>
		<td>:</td>
		<td><input type="text" name="noTelp" class="form-control" required/></td>
	</tr>
    <tr>
		<td>Dewasa</td>
		<td>:</td>
		<td><input type="number" name="dewasa" class="form-control" style="width:50px;" required/></td>
	</tr>
    <tr>
		<td>Anak</td>
		<td>:</td>
		<td><input type="number" name="anak" class="form-control" style="width:50px;" required/></td>
	</tr>
    <tr>
		<td colspan=3 align='center'><input type="submit" name="submit" value="Simpan" class='btn btn-primary btn-sm'/>
        <a href="?"><input type="button" name="batal" value="Batal" class='btn btn-warning btn-sm'/></a></td>
	</tr>
</table>
</form>

<? 

}else{
echo"*) Silahkan pilih Jadwal dan Tujuan Kereta anda !";
		
echo"<form method='post' action=''>";
$select = 'SELECT * FROM kereta ORDER BY idKA ASC';
$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
if(mysql_num_rows($resultselect)==0){
	echo"<center>Data tidak tersedia!</center>";
}else{
echo "<center><table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'></th>
	<th bgcolor='silver'>Nama Kereta</th>
	<th bgcolor='silver'>Jadwal Berangkat</th>
	<th bgcolor='silver'>Jadwal Tiba</th>
	<th bgcolor='silver'>Dari</th>
	<th bgcolor='silver'>Ke</th>
	<th bgcolor='silver'>Harga (Kelas)</th>
</tr>";
$no=0;
while($row = mysql_fetch_array($resultselect)){
extract($row);
$lihat=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE idKelas = '$idKelas'"));
echo "<tr align='center'>
	<td><input name='pilih' onChange='this.form.submit()' type='radio' value='".$idKA."'><sub>".$no=1+$no."</sub></td>
	<td>".$namaKA."</td>
	<td>".$tanggalBerangkat." - ".$jamBerangkat."</td>
	<td>".$tanggalTiba." - ".$jamTiba."</td>
	<td>".$dari."</td>
	<td>".$ke."</td>
	<td>".$lihat['namaKelas']." - ".number_format($lihat['harga'],0,',','.')."</td>
</tr>";
}
echo"</table></center>";
}
echo"</form>

";
}?>
