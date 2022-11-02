
<?php echo $this->Section('content'); ?>
<h4>Welcome to Contact Us Page!</h4>
<table>
	<tr>
		<td>Name:</td>
		<td><?= $data['name']; ?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?= $data['email']; ?></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td><?= $data['address']; ?></td>
	</tr>
</table>
<?php echo $this->EndSection('content'); ?>
<?php echo $this->extend('layouts/master'); ?>