  <div class="blog-header">
        <h1 class="blog-title">Pembayaran</h1>
        <p>melakukan pembayaran jika sudah memesan.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
         <table class="table">
         <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<tr>";
        			echo "<td>".$Rows->nama."</td>";
                    echo "<td>".number_format($Rows->harga_seat)."</td>";
                    echo "<td><a href='".base_url()."uploads/".$Rows->url_bukti."' ><img src='".base_url()."/uploads/".$Rows->url_bukti."' style='height:30px;'></a></td>";
                    echo "<td><a href='".site_url()."app/pelunasan/?id=".$Rows->id."' class='btn btn-warning'>Bayar</a></td>";
                    echo "<td><a href='".site_url()."app/cetak_booking/?id=".$Rows->id."'>cetak booking</a></td>";
                    echo "</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>
		</div>
	</div>