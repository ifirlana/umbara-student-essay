  <div class="blog-header">
        <h1 class="blog-title">Jadwal Keberangkatan</h1>
      </div>
      <div class="row">
        <div class="col-sm-8 blog-main">

            <div class="container">
                <form class="form-signin" method="POST" action="<?php echo site_url();?>app/insert_jadwal">
                   <!-- <input type="text" class="form-control" name="id_tipe_kendaraan" placeholder="tipe kendaraan" required autofocus> -->
				   <select name="id_tipe_kendaraan" class="form-control">
						<?php
							foreach($query_kendaraan->result() as $Rows)
							{
								echo "<option value='".$Rows->id."'>".$Rows->kode."</option>";
							}
						?>
					</select>
                    
                    <input type="text" class="form-control" name="keterangan" placeholder="keterangan" required>
                    <select type="text" class="form-control" name="status" placeholder="status">
                    	<option value ="berangkat">berangkat</option>
		                <option value="ready">ready</option>
		                <option value="cancel">cancel</option>	                
                    </select>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Simpan">
                </form> 
            </div>
        </div>
    
        <div class="col-sm-8 blog-main">
        <table class="table">
        <tr>
            <th>Status Jadwal</th>
            <th>Keterangan</th>
            <th>Tipe Kendaraan</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
            foreach($query->result() as $Rows)
            {
                echo "<tr>";
                    echo "<td>".$Rows->status."</td>";
                    echo "<td>".$Rows->keterangan."</td>";
                    echo "<td>".$Rows->id_tipe_kendaraan."</td>";
                    echo "<td><a href='".site_url()."app/hapus_jadwal/?id=".$Rows->id."' class='btn btn-danger'>Hapus</a></td>";
                echo "</tr>";
            }
        }
        ?>
        </table>
        </div>
	</div>