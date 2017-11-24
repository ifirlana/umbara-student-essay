<div class="blog-header">
    <h1 class="blog-title">Laporan</h1>
    <p>semua laporan melakukan pembayaran dan Booking.</p>
</div>
<div class="row">
	<div class="col-sm-8 blog-main">
		<div class="blog-post jumbotron">
        <form role="form" method="POST" action="<?php echo site_url()?>app/print_datebetween/">
			<div class="form-group">
			    <label for="exampleInputEmail0">Tanggal Awal Laporan Pembayaran</label>
				<input type="date" class="form-control" name="datestart" id="exampleInputEmail0" value="" />
				<label for="exampleInputEmail1">Tanggal Akhir Laporan Pembayaran</label>
				<input type="date" class="form-control" name="dateend" id="exampleInputEmail1" value="" />
			</div>
				<input type="submit" class="btn btn-info" value="submit" />
		</form>
		</div>
	</div>
	<div class="col-sm-8 blog-main">
		<div class="blog-post jumbotron">
        <form role="form" method="POST" action="<?php echo site_url()?>app/printbooking_datebetween/">
			<div class="form-group">
			    <label for="exampleInputEmail0">Tanggal Awal Laporan Booking</label>
				<input type="date" class="form-control" name="datestart" id="exampleInputEmail0" value="" />
				<label for="exampleInputEmail1">Tanggal Akhir Laporan Booking</label>
				<input type="date" class="form-control" name="dateend" id="exampleInputEmail1" value="" />
			</div>
				<input type="submit" class="btn btn-info" value="submit" />
		</form>
		</div>
	</div>
</div>