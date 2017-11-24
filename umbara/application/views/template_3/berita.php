<div class="blog-header">
    <h1 class="blog-title">BERITA</h1>
</div>
<div>
	<?php 
	foreach($query->result() as $Rows)
	{
		echo $Rows->content."";
	}?>
</div>