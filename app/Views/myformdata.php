<?php 
	if(isset($validation))
	{
	 echo $validation->listErrors();
	}
	?>
<form action="<?= site_url('myformdata') ?>" method="Post">
	<p>
		Name:<input type="text" name="name">
	</p>
	<p>
		Email:<input type="email" name="email">
	</p>
	<p>
		Phone:<input type="number" name="phone">
	</p>
	<p><input type="submit" name=""></p>
</form>