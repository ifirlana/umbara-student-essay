<?php
/*
if(isset($query) and $query->num_rows() > 0)
{
	foreach($query->result() as $rows)
	{

		echo "<a href='javascript:window.print()' onclick='location.href=".site_url()."app/home/'>print</a><br>";
		echo "<h2>Tanda Surat Jalan Travel</h2>";
		echo "tanggal : ".$rows->date_added."<br>";
		echo "status :".$rows->status."<br>";
		echo "jadwal : ".$rows->keterangan."<br>";
		echo "tipe_kendaraan : ".$rows->id_tipe_kendaraan."<br>";
	}
}
*/
?>
<?php
if(isset($query) and $query->num_rows() > 0)
{
	foreach($query->result() as $rows)
	{

		echo "<a href='javascript:window.print()' onclick='location.href=".site_url()."app/home/'>print</a><br>";
		echo "<table class='table table-bordered' border='1'>
			<tr><th class='warning'><center><img src='".base_url()."assets/img_template_3/logo.jpg' class='img-responsive img-thumbnail' alt='Responsive image' style='height:60px;'></center></th><th class='warning' style='font-size:30px;'><center>Tanda Surat Jalan Travel</center></th></tr>";
		echo "<tr><td>tanggal</td><td>".$rows->date_added."</td></tr>";
		echo "<tr><td>status</td><td>".$rows->status."</td></tr>";
		echo "<tr><td>jadwal</td><td> ".$rows->keterangan."</td></td>";
		echo "<tr><td>tipe_kendaraan</td><td>".$rows->id_tipe_kendaraan."</td></table>";
	}
}
?>