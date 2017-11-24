  <div class="blog-header">
        <h1 class="blog-title">Seat</h1>
      </div>
      <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="container">
                <form class="form-signin" method="POST" action="<?php echo site_url();?>app/insert_seat">
                    <!--<input type="text" class="form-control" name="id" placeholder="id tipe kendaraan" required autofocus>-->
					<select name="id" class="form-control">
						<?php
							foreach($query_kendaraan->result() as $Rows)
							{
								echo "<option value='".$Rows->kode."'>".$Rows->kode."</option>";
							}
						?>
					</select>
                    <input type="text" class="form-control" name="seat" placeholder="seat" required>
                    <input type="text" class="form-control" name="harga" placeholder="Harga" required>
                     <input class="btn btn-lg btn-primary btn-block" type="submit" value="Simpan">
                </form> 
            </div>
        </div>
    
        <div class="col-sm-8 blog-main">
         <table class="table">
         <tr>
            <th>Tipe Kendaraan</th>
            <th>kode</th>
            <th>Seat</th>
            <th>Harga</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{ 
        		echo "<tr>";
        			echo "<td>".$Rows->id."</td>";
        			echo "<td>".$Rows->kode."</td>";
                    echo "<td>".$Rows->nama_seat."</td>";
                    echo "<td>".$Rows->harga."</td>";
                    echo "<td><a href='".site_url()."app/hapus_seat/?id=".$Rows->id."&seat=".$Rows->nama_seat."' class='btn btn-danger'>Hapus</a>";
                    echo "</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>
		</div>
	</div>