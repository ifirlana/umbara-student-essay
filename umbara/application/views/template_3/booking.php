      <div class="blog-header">
        <h1 class="blog-title">Tipe Kendaraan <?php echo $id_kendaraan;?></h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          
          <div class="blog-post">
          <form role="form" method="POST" action="<?php echo site_url();?>app/insert_booking">
		  <?php
			for($i=0;$i<count($seat);$i++)
			{
				echo "<input type='hidden' name='seat[".$i."]' value='".$seat[$i]."' />";
			}
		  ?>
          <input type="hidden" name="id_tipe_kendaraan" value="<?php echo $id_kendaraan;?>" />
          <input type="hidden" name="id_jadwal" value="<?php echo $id;?>" />
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama</label>
			    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">KTP / SIM</label>
			    <input type="text" name="ktp" class="form-control" id="exampleInputPassword1" placeholder="Enter KTP / SIM">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword2">Tanggal Pemesanan Tiket</label>
			    <input type="text" name="date_added" class="form-control" id="exampleInputPassword2" value="<?php if($date){ echo $date; }else{echo date("Y-m-d H:i:s");}?>">
			  </div>
			  <button type="submit" class="btn btn-success">Submit</button>
			</form>
        </div><!-- /.blog-post -->

   
        </div><!-- /.blog-main -->
