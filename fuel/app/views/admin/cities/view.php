<h2>Viewing #<?php echo $city->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $city->title; ?></p>

<?php echo Html::anchor('admin/cities/edit/'.$city->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/cities', 'Back'); ?>