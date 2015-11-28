<h2>Listing Champs</h2>
<br>
<?php if ($champs): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Champ</th>
			<th>Val init</th>
			<th>Val final</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($champs as $item): ?>		<tr>

			<td><?php echo $item->champ; ?></td>
			<td><?php echo $item->val_init; ?></td>
			<td><?php echo $item->val_final; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<?php echo Html::anchor('admin/champs/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/champs/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/champs/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Champs.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/champs/create', 'Add new Champ', array('class' => 'btn btn-success')); ?>

</p>
