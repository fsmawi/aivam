<h2>Viewing #<?php echo $champ->id; ?></h2>

<p>
	<strong>Champ:</strong>
	<?php echo $champ->champ; ?></p>
<p>
	<strong>Val init:</strong>
	<?php echo $champ->val_init; ?></p>
<p>
	<strong>Val final:</strong>
	<?php echo $champ->val_final; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $champ->status; ?></p>

<?php echo Html::anchor('admin/champs/edit/'.$champ->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/champs', 'Back'); ?>