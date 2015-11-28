<h2>Editing Champ</h2>
<br>

<?php echo render('admin/champs/_form'); ?>
<p>
	<?php echo Html::anchor('admin/champs/view/'.$champ->id, 'View'); ?> |
	<?php echo Html::anchor('admin/champs', 'Back'); ?></p>
