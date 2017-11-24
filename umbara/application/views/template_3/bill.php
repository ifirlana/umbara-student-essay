 <div class="blog-header">
        <h1 class="blog-title">Bill</h1>
      </div>
      <div class="row">
        <div class="col-sm-8 blog-main">
		  <table class="table">
         <tr>
            <th>ID</th>
            <th>Keterangan</th>
            <th>Seat</th>
            <th>Harga</th>
            <th>Upload Pembayaran</th>
            <th>&nbsp;</th>
        </tr>
		<?php
        if(isset($query) and $query->num_rows() > 0)
        {
			
        	foreach($query->result() as $Rows)
        	{ 
				echo "<tr>";
        			echo "<td>".$Rows->id."</td>";
					echo "<td>".$Rows->keterangan."</td>";
					echo "<td>".$Rows->nama_seat."</td>";
					echo "<td>".$Rows->harga_seat."</td>";
					echo "<td>";
					if($Rows->url_bukti == 0)
					{
						echo "<a href='".site_url()."app/upload_pembayaran/?id=".$Rows->id."' class='btn btn-info'>click here</a>";
					}
					else
					{
						echo "<a href='".site_url()."app/upload_pembayaran/?id=".$Rows->id."' class='btn btn-success'>sudah Upload</a>";
					}
					echo "</td>";
				echo "<td><a href='".site_url()."app/cetak_booking/?id=".$Rows->id."'>cetak booking</a></td>";	
				echo "</tr>";
			}
		}
        ?>
		</table>
		</div>
	</div>