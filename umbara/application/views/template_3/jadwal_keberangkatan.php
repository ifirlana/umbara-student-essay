<div class="blog-header">
        <h1 class="blog-title">Jadwal Keberangkatan</h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        <table class="table">
        <tr>
        	<th>Status Jadwal</th>
        	<th>Keterangan</th>
        	<th>Tipe Kendaraan</th>
            <th>Tanggal Pencarian</th>
        	<th>&nbsp;</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<tr><form method='GET' action='".site_url()."app/check_user/'>";
                    echo "<input type='hidden' value='".$Rows->id."' name='keberangkatan'>";
                    echo "<input type='hidden' value='".$Rows->id_tipe_kendaraan."' name='kendaraan'>";
                    echo "<td>".$Rows->status."</td>";
        			echo "<td>".$Rows->keterangan."</td>";
                    echo "<td>".$Rows->id_tipe_kendaraan."</td>";
        			echo "<td><input type='date' name='date' class='form-control' /></td>";
        			echo "<td><input type='submit' class='btn btn-default' value='check'></td>";
        		echo "</form></tr>";
        	}
        }
        ?>
        </table>
		</div>
	</div>