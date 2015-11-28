<h2>Viewing #<?php echo $body_type->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $body_type->title; ?></p>

<?php echo Html::anchor('admin/body/types/edit/'.$body_type->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/body/types', 'Back'); ?>