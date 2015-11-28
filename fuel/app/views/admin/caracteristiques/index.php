<h2>Listing Caracteristiques</h2>
<br>
<?php if ($caracteristiques): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($caracteristiques as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td>				
				<?php echo Html::anchor('admin/caracteristiques/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/caracteristiques/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Caracteristiques.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/caracteristiques/create', 'Add new Caracteristique', array('class' => 'btn btn-success')); ?>

</p>
