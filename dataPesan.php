<?php

if(isset($_GET['upidPesan'])){

	if($_GET['status']=="Y"){

		mysql_query("UPDATE pesan SET status = 'N' WHERE idPesan = '$_GET[upidPesan]'");

		echo"<script>
		alert('Data dibatalkan');
		window.location.href='?page=datapesan';
		</script>";
	}else{ 

		mysql_query("UPDATE pesan SET status = 'Y' WHERE idPesan = '$_GET[upidPesan]'");
		
		echo"<script>
		alert('Data disetujui');
		window.location.href='?page=datapesan';
		</script>";
	}
	
}

$select = "SELECT a.*, concat(b.namaKA,' - ',b.dari,' &raquo; ',b.ke,' - ',c.namaKelas) as idKA
FROM pesan a, kereta b, kelas c
WHERE a.idKA = b.idKA
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
	<th bgcolor='silver'>ID. Kereta</th>
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
	<td>".$idKA."</td>
	<td align='center'><a href='?page=datapesan&upidPesan=$idPesan&status=$status' class='btn btn-info btn-sm'>".$butt."</a></td>
</tr>";
}
echo"</table>";
}
?>
