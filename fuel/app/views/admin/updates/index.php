<h2>Listing Updates</h2>
<br>
<?php if ($updates): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Conditions</th>
			<th>Changes</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($updates as $item): ?>		<tr>

			<td><?php echo $item->conditions; ?></td>
			<td><?php echo $item->changes; ?></td>
			<td>
				<?php echo Html::anchor('admin/updates/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Updates.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/updates/create', 'Add new Update', array('class' => 'btn btn-success')); ?>

</p>
