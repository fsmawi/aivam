<h2>Viewing #<?php echo $marque->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $marque->title; ?></p>

<?php echo Html::anchor('admin/marques/edit/'.$marque->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/marques', 'Back'); ?>