<h2>Listing Models</h2>
<br>
<?php if ($models): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($models as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>				
				<?php echo Html::anchor('admin/models/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/models/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Models.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/models/create', 'Add new Model', array('class' => 'btn btn-success')); ?>

</p>
