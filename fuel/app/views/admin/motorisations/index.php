<h2>Listing Motorisations</h2>
<br>
<?php if ($motorisations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($motorisations as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>				
				<?php echo Html::anchor('admin/motorisations/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/motorisations/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Motorisations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/motorisations/create', 'Add new Motorisation', array('class' => 'btn btn-success')); ?>

</p>
