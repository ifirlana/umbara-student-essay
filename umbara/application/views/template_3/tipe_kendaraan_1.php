<div class="blog-header">
        <h1 class="blog-title">Kendaraan Tipe <?php echo $id_kendaraan;?></h1>
      </div>
	<form method="POST" action="<?php echo site_url()."app/booking/";?>">
       
      <div class="row">

        <div class="col-sm-8 blog-main">
		 <?php /*
		<table class="table">
        <?php
		
        if(isset($query) and $query->num_rows() > 0)
        {
        	foreach($query->result() as $Rows)
        	{
        		echo "<tr>";
        			echo "<td>".$Rows->seat."</td>";
                    echo "<td>".number_format($Rows->harga)."</td>";
                    echo "<td>";
                    if($Rows->status_seat == null or empty($Rows->status_seat))
                    {
                        echo "<a href='".site_url()."app/booking/?keberangkatan=".$Rows->id."&kendaraan=".$Rows->id_tipe_kendaraan."&seat=".$Rows->id_seat."&date=".$date."' class='btn btn-success'>Kosong</a>";
                    }
                    else{
                        echo "<a href='#' class='btn btn-danger'>Terisi</a>";
                    }
                    echo "</td>";
        		echo "</tr>";
        	}
        }
        ?>
        </table>
		*/?>
			 <?php
		
        if(isset($query) and $query->num_rows() > 0)
        {
			?>
			<input type="hidden" name="keberangkatan" value="<?php echo $query->result()[0]->id?>" />
			<input type="hidden" name="kendaraan" value="<?php echo $query->result()[0]->id_tipe_kendaraan?>" />
			<input type="hidden" name="date" value="<?php echo $date?>" />
			<?php
        	foreach($query->result() as $Rows)
        	{
					if($Rows->status_seat == null or empty($Rows->status_seat))
                    {
				?>
				<div class="btn btn-success" style="margin:0.8em;"><input type="checkbox" name="id_seat[]" value = "<?php echo $Rows->id_seat; ?>" /> <?php echo $Rows->seat; ?>  Kosong </div>
				<?php
					}else
					{
					?>
					<div class="btn btn-danger" style="margin:0.8em;"><input type="checkbox" name="id_seat[]" disabled /> <?php echo $Rows->seat; ?> Terisi </div>
					<?php
					}
			}
		}
		?>
		</div>
		</div>
		<div class="row">
			<div class="col-sm-8 blog-main">
				<input type="submit" name="submit" value="Submit" class="btn btn-info">
			</div>
		</div>
		<br />
		</form>
		</div>
	</div>