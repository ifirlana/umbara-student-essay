<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_transaksi_pembayaran.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table class="table">
        <tr>
        	<th>Waktu</th>
                <th>Status Jadwal</th>
        	<th>Keterangan</th>
        	<th>Tipe Kendaraan</th>
        	<th>nama</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<tr>";
        			echo "<td>".$Rows->date_added."</td>";
                                echo "<td>".$Rows->id_jadwal."</td>";
        			echo "<td>".$Rows->seat."</td>";
        			echo "<td>".$Rows->harga."</td>";
        			echo "<td>".$Rows->nama."</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>