
<?php 
	
	if(session()->get('session'))
	{
		echo "<h3>".session()->get('session')."</h3>";  
	}

    ?>

<form action="<?= site_url('myfile') ?>" method='post' enctype='multipart/form-data'>
	<table>
		<tr>
			<td>File:</td>
			<td><input type="file" name="file"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name=""></td>
		</tr>
	</table>
</form>