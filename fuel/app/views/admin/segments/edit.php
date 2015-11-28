<h2>Editing Segment</h2>
<br>

<?php echo render('admin/segments/_form'); ?>
<p>
	<?php echo Html::anchor('admin/segments/view/'.$segment->id, 'View'); ?> |
	<?php echo Html::anchor('admin/segments', 'Back'); ?></p>
