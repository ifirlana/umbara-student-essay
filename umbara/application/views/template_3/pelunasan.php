      <div class="blog-header">
        <h1 class="blog-title">Pelunasan</h1>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          
          <div class="blog-post">
          <form role="form" method="POST" action="<?php echo site_url();?>app/insert_pelunasan">
          <input type="hidden" name="id_keberangkatan" value="<?php echo $id;?>" />
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama</label>
			    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo $query[0]->nama;?>">
			  </div>
			 <div class="form-group">
			    <label for="exampleInputPassword2">Tanggal Pemesanan Tiket</label>
			    <input type="text" name="date_added" class="form-control" id="exampleInputPassword2" value="<?php echo $query[0]->date_added;?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword3">Harga</label>
			    <input type="text" name="harga" class="form-control" id="exampleInputPassword3" value="<?php echo $query[0]->harga_seat;?>">
			  </div>
			  <button type="submit" class="btn btn-success">Submit</button>
			</form>
        </div><!-- /.blog-post -->

   
        </div><!-- /.blog-main -->
