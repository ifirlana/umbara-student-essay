<div class="blog-header">
        <h1 class="blog-title">Keberangkatan Armada</h1>
        <p>meluncurkan unit armada jika sudah pada jadwal keberangktan.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        <table class="table">
        <tr>
            <th>Id</th>
        	<th>Status Jadwal</th>
        	<th>Keterangan</th>
            <th>Total</th>
        	<th>Tipe Kendaraan</th>
            <th>&nbsp;</th>
        	<th>&nbsp;</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<form method='POST'>";
                ?>
                <input type="hidden" name="id_jadwal" value="<?php echo $Rows->id?>">
                <input type="hidden" name="id_tipe_kendaraan" value="<?php echo $Rows->id_tipe_kendaraan?>">
                <?php
                echo "<tr>";
        			echo "<td>".$Rows->id."</td>";
                    echo "<td>".$Rows->status."</td>";
                    echo "<td>".$Rows->keterangan."</td>";
        			echo "<td>".$this->m_jadwal->getTotalPenumpang($Rows->id)->result()[0]->total."</td>";
        			echo "<td>".$Rows->id_tipe_kendaraan."</td>";
        		echo "<td>";
                ?>
                <select name="status" class="form-control">
                <option value = "<?php echo $Rows->status;?>" selected><?php echo $Rows->status;?></option>
                <option value ="berangkat">berangkat</option>
                <option value="ready">ready</option>
                <option value="cance">cancel</option>
                </select>
                <?php
                echo"</td>";
                echo "<td><input type='submit' value='submit' class='btn btn-info'></td>";
                echo "</tr></form>";
        	}
        }
        ?>
        </table>
		</div>
	</div>