<h2>Editing Update</h2>
<br>

<?php echo render('admin/updates/_form'); ?>
<p>
	<?php echo Html::anchor('admin/updates/view/'.$update->id, 'View'); ?> |
	<?php echo Html::anchor('admin/updates', 'Back'); ?></p>
