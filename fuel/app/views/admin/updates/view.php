<h2>Viewing #<?php echo $update->id; ?></h2>

<p>
	<strong>Conditions:</strong>
	<?php echo $update->conditions; ?></p>
<p>
	<strong>Changes:</strong>
	<?php echo $update->changes; ?></p>

<?php echo Html::anchor('admin/updates/edit/'.$update->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/updates', 'Back'); ?>