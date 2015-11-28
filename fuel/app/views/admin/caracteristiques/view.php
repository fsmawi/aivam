<h2>Viewing #<?php echo $caracteristique->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $caracteristique->title; ?></p>

<?php echo Html::anchor('admin/caracteristiques/edit/'.$caracteristique->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/caracteristiques', 'Back'); ?>