<h2>Editing Motorisation</h2>
<br>

<?php echo render('admin/motorisations/_form'); ?>
<p>
	<?php echo Html::anchor('admin/motorisations/view/'.$motorisation->id, 'View'); ?> |
	<?php echo Html::anchor('admin/motorisations', 'Back'); ?></p>
