<h2>Editing City</h2>
<br>

<?php echo render('admin/cities/_form'); ?>
<p>
	<?php echo Html::anchor('admin/cities/view/'.$city->id, 'View'); ?> |
	<?php echo Html::anchor('admin/cities', 'Back'); ?></p>
