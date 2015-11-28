<h2>Listing Marques</h2>
<br>
<?php if ($marques): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($marques as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>				
				<?php echo Html::anchor('admin/marques/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/marques/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Marques.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/marques/create', 'Add new Marque', array('class' => 'btn btn-success')); ?>

</p>
