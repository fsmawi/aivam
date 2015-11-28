<h2>Viewing #<?php echo $carburation->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $carburation->title; ?></p>

<?php echo Html::anchor('admin/carburations/edit/'.$carburation->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/carburations', 'Back'); ?>