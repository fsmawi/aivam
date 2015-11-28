<h2>Listing Cities</h2>
<br>
<?php if ($cities): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cities as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>
				<?php echo Html::anchor('admin/cities/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/cities/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/cities/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cities.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/cities/create', 'Add new City', array('class' => 'btn btn-success')); ?>

</p>
