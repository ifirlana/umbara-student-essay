<?php
if(isset($query) and $query->num_rows() > 0)
{
	foreach($query->result() as $rows)
	{

		echo "<a href='javascript:window.print()' onclick='location.href=".site_url()."app/home/'>print</a><br>";
		echo "<table class='table table-bordered' border='1'>
			<tr><th class='warning'><center><img src='".base_url()."assets/img_template_3/logo.jpg' class='img-responsive img-thumbnail' alt='Responsive image' style='height:60px;'></center></th><th class='warning' style='font-size:30px;'><center>Tanda Booking Travel UMBARA</center></th></tr>";
		echo "<tr><td>tanggal</td><td>".$rows->date_added."</td></tr>";
		echo "<tr><td>status</td><td>".$rows->status."</td></tr>";
		echo "<tr><td>nama</td><td>".$rows->nama."</td></td>";
		echo "<tr><td>ktp</td><td>".$rows->ktp."</td></table>";
	}
}
?>