<?php 
include 'koneksi.php';
?>
 
<h3 align="center" > Cari Tiket Kereta Anda </h3>
<form align="center" action="caripesawat.php" method="get">
	<label>Masukkan Nama :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari" class='btn btn-warning btn-sm'>
	<a href="haluser.php?page=caripesawat"><input type="button" name="Kembali" value="Batal" class='btn btn-warning btn-sm'/></a>
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
 <br>
<table table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
	<tr>
		
	   <th bgcolor='silver'>No</th>
	   <th bgcolor='silver'>Nama Pemesan</th>
	   <th bgcolor='silver'>Alamat</th>
	   <th bgcolor='silver'>ID Kereta</th>
	   <th bgcolor='silver'>Status</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysql_query("select * from pesan where namaPemesan like '%".$cari."%'");				
	}else{
		$data = mysql_query("select * from pesan");		
	}
	$no = 1;
	while($d = mysql_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['namaPemesan']; ?></td>
		<td><?php echo $d['alamat']; ?></td>
		<td><?php echo $d['idKA']; ?></td>
		<td><?php echo $d['status']; ?></td>
	</tr>
	<?php } ?>
</table>



<br><br>



<h3 align="center"> Cari Tiket Pesawat Anda </h3>

 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
	<tr>
		
	   <th bgcolor='silver'>No</th>
	   <th bgcolor='silver'>Nama Pemesan</th>
	   <th bgcolor='silver'>Alamat</th>
	   <th bgcolor='silver'>ID Maskapai</th>
	   <th bgcolor='silver'>Status</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysql_query("select * from pesanPsw where namaPemesan like '%".$cari."%'");				
	}else{
		$data = mysql_query("select * from pesanPsw");		
	}
	$no = 1;
	while($d = mysql_fetch_array($data)){
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['namaPemesan']; ?></td>
		<td><?php echo $d['alamat']; ?></td>
		<td><?php echo $d['idPsw']; ?></td>
		<td><?php echo $d['status']; ?></td>
	</tr>
	<?php } ?>

</table>
</center>
</table>