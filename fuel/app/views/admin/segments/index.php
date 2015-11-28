<h2>Listing Segments</h2>
<br>
<?php if ($segments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($segments as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>
				<?php echo Html::anchor('admin/segments/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/segments/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/segments/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Segments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/segments/create', 'Add new Segment', array('class' => 'btn btn-success')); ?>

</p>
