<h2>Listing Body_types</h2>
<br>
<?php if ($body_types): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($body_types as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>
				<?php echo Html::anchor('admin/body/types/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/body/types/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/body/types/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Body_types.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/body/types/create', 'Add new Body type', array('class' => 'btn btn-success')); ?>

</p>
