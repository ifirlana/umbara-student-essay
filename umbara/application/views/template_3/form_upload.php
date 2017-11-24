<?php echo form_open_multipart('app/do_upload');?>
<input type="text" name="id" value="<?php echo $id;?>">
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form> 
