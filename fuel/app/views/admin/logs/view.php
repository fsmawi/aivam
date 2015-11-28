<h2>Viewing #<?php echo $log->id; ?></h2>

<p>
	<strong>User:</strong>
	<?php echo $log->user->username; ?></p>
<p>
	<strong>Number:</strong>
	<?php echo $log->number; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $log->status; ?></p>

<?php echo Html::anchor('admin/logs/edit/'.$log->id, 'Edit'); ?> |
<?php echo Html::anchor('admin', 'Back'); ?>