<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <?php 
            $privillage = $this->session->userdata('id_privillage');
          if(empty($privillage) or $privillage == 4){
            ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/view_jadwal_user">Jadwal <?php //echo $privillage;?></a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/berita">Berita <?php //echo $privillage;?></a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/tentang_kami">Tentang Kami <?php //echo $privillage;?></a>
          <?php 
		  if($privillage){
		  ?>
		  <a class="blog-nav-item" href="<?php echo site_url()?>app/bill">Bill <?php //echo $privillage;?></a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/logout_app">logout</a>
		  <?php
		  }
		  else{
		  ?>
		  <a class="blog-nav-item" href="<?php echo site_url()?>app/login_konsumen">login</a>
          <?php
		  }
          }else{
          ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/home">Home <?php //echo $privillage;?></a>
          <?php
          if($privillage == 1)
          {
          ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/jadwal_perubahan">Keberangkatan</a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/seat">Seat</a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/jadwal_keberangkatan">Jadwal</a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/formBerita">Berita</a>
          <?php
          }
          ?>
          <?php
          if($privillage == 2)
          {
          ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/jadwal_booking">Jadwal Keberangkatan</a>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/pembayaran">Pembayaran</a>
          <?php 
          }
          if($privillage == 3){
          ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/laporan">Laporan</a>
          <?php 
          }
          if($privillage){
          ?>
          <a class="blog-nav-item" href="<?php echo site_url()?>app/logout_app">logout</a>
          <?php
          }
        }
          ?>
        </nav>
      </div>
    </div>
    <div>
     <img class="" src="<?php echo base_url()?>assets/img_template_3/2.jpg" style="width:25%;margin:0 5% 0 5%;">
    <hr />
    </div> 
    <div class="" style="margin:0 5%;">
	<?php 
	if(isset($content))
	{
		echo $content;
	}
	?>
    </div><!-- /.container -->
    <div class="blog-footer">
      <p>Aplikasi Travel Umbara Trans &copy;2014</p>
      </div>

</div><!-- /wrapper-->