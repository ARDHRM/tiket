
<?php
if(isset($_GET['upidPesan'])){

	if($_GET['status']=="Y"){

		mysql_query("UPDATE pesanPsw SET status = 'N' WHERE idPesan = '$_GET[upidPesan]'");

		echo"<script>
		alert('Data dibatalkan');
		window.location.href='?page=datapesanPsw';
		</script>";
	}else{ 

		mysql_query("UPDATE pesanPsw SET status = 'Y' WHERE idPesan = '$_GET[upidPesan]'");
		
		echo"<script>
		alert('Data disetujui');
		window.location.href='?page=datapesanPsw';
		</script>";
	}
	
}

$select = "SELECT a.*, concat(b.namaPsw,' - ',b.dari,' &raquo; ',b.ke,' - ',c.namaKelas) as idPsw
FROM pesanPsw a, pesawat b, kelas c
WHERE a.idPsw = b.idPsw
AND b.idKelas = c.idKelas
ORDER BY idPesan DESC";
$resultselect= mysql_query($select)or die ('Error load data : '.mysql_error());
if(mysql_num_rows($resultselect)==0){ 
	echo"<center>Data tidak tersedia!</center>";	
}else{	
echo "<table class='table table-striped table-bordered table-condensed bootstrap-datatable datatable' cellspacing='0' cellpadding='0' width='80%' align ='center' border ='1'>
<tr>
	<th bgcolor='silver'>No</th>
	<th bgcolor='silver'>Nama Pemesan</th>
	<th bgcolor='silver'>Alamat</th>
	<th bgcolor='silver'>No. Telp</th>
	<th bgcolor='silver'>Dewasa</th>
	<th bgcolor='silver'>Anak</th>
	<th bgcolor='silver'>Maskapai Pesawat</th>
	<th bgcolor='silver'></th>
</tr>";
$no=0;
while($row = mysql_fetch_array($resultselect)){
extract($row);
if($status=="Y"){$butt="Batalkan";}else{$butt="Setujui";}
echo "<tr>
	<td align='center'>".$no=1+$no."</td>
	<td>".$namaPemesan."</td>
	<td>".$alamat."</td>
	<td>".$noTelp."</td>
	<td align='center'>".$dewasa."</td>
	<td align='center'>".$anak."</td>
	<td>".$idPsw."</td>
	<td align='center'><a href='?page=datapesanPsw&upidPesan=$idPesan&status=$status' class='btn btn-info btn-sm'>".$butt."</a></td>
</tr>";
}
echo"</table>";
}
?>
