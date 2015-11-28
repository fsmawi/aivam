<h2>Editing Caracteristique</h2>
<br>

<?php echo render('admin/caracteristiques/_form'); ?>
<p>
	<?php echo Html::anchor('admin/caracteristiques/view/'.$caracteristique->id, 'View'); ?> |
	<?php echo Html::anchor('admin/caracteristiques', 'Back'); ?></p>
