<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_transaksi_booking.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table class="table">
        <tr>
        	<th>Waktu Booking</th>
                <th>Waktu Pembayaran</th>
                <th>Status</th>
        	<th>id_jadwal</th>
        	<th>Seat</th>
                <th>nama</th>
                <th>ktp</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<tr>";
        			echo "<td>".$Rows->date_added."</td>";
                                echo "<td>".$Rows->date_modified."</td>";
                                echo "<td>".$Rows->status."</td>";
                                echo "<td>".$Rows->id_jadwal."</td>";
        			echo "<td>".$Rows->seat."</td>";
        			echo "<td>".$Rows->nama."</td>";
        			echo "<td>".$Rows->ktp."</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>