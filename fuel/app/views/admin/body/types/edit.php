<h2>Editing Body_type</h2>
<br>

<?php echo render('admin/body/types/_form'); ?>
<p>
	<?php echo Html::anchor('admin/body/types/view/'.$body_type->id, 'View'); ?> |
	<?php echo Html::anchor('admin/body/types', 'Back'); ?></p>
