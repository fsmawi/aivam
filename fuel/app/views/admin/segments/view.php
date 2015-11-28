<h2>Viewing #<?php echo $segment->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $segment->title; ?></p>

<?php echo Html::anchor('admin/segments/edit/'.$segment->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/segments', 'Back'); ?>