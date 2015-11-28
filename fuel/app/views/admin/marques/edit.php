<h2>Editing Marque</h2>
<br>

<?php echo render('admin/marques/_form'); ?>
<p>
	<?php echo Html::anchor('admin/marques/view/'.$marque->id, 'View'); ?> |
	<?php echo Html::anchor('admin/marques', 'Back'); ?></p>
