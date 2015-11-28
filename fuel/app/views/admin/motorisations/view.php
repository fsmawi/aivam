<h2>Viewing #<?php echo $motorisation->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $motorisation->title; ?></p>

<?php echo Html::anchor('admin/motorisations/edit/'.$motorisation->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/motorisations', 'Back'); ?>