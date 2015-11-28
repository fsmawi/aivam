<h2>Listing Carburations</h2>
<br>
<?php if ($carburations): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($carburations as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>				
				<?php echo Html::anchor('admin/carburations/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/carburations/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Carburations.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/carburations/create', 'Add new Carburation', array('class' => 'btn btn-success')); ?>

</p>
