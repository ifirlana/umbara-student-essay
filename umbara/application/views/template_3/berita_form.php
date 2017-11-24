<div class="blog-header">
    <h1 class="blog-title">BERITA</h1>
</div>
<div>
<form method='POST'>
<textarea name='content' class="form-control">
	<?php 
	foreach($query->result() as $Rows)
	{
		echo $Rows->content."";
	}?>
	</textarea>
	<input type='submit' class='btn btn-info'>
</form>
</div>