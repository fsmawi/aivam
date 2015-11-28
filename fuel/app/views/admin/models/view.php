<h2>Viewing #<?php echo $model->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $model->title; ?></p>

<?php echo Html::anchor('admin/models/edit/'.$model->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/models', 'Back'); ?>