<form class="form-horizontal" method="get" action="<?php echo Uri::create('admin/items/list'.(!is_null($id)?'/'.$id:'/0'));?>">

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Status</label>
        <div class="col-md-4">
            <select id="status" name="status" class="form-control">
                <option value=""></option>
                <option value="ok">OK</option>
                <option value="check">check</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" value="Send" class="btn btn-success" id="submit">Filter</button>
        </div>
    </div>

</form>

<?php if ($items): ?>
<table class="table table-striped">
	<thead>
		<tr>

			<th>Year</th>
			<th>Month</th>
			<th>City</th>
			<th>Group</th>
			<th>Make</th>
			<th>Premium segment</th>
<!--			<th>Model gnr</th>-->
			<th>Model</th>
			<th>Segment</th>
			<th>Engine type</th>
			<th>Type</th>
			<!--<th>Displacement</th>-->
			<th>Sales</th>
			<th>Origine</th>
			<!--<th>Body type</th>-->
			<th>Rsp</th>
<!--			<th>Suv type</th>-->
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>

			<td><?php echo $item['year']; ?></td>
			<td><?php echo $item['month']; ?></td>
			<td><?php echo $item['city']; ?></td>
			<td><?php echo $item['group']; ?></td>
			<td><?php echo $item['make']; ?></td>
			<td><?php echo ($item['premium_segment'])?$item['premium_segment']:''; ?></td>
<!--			<td><?php echo $item['model_gnr']; ?></td>-->
			<td><?php echo $item['model']; ?></td>
			<td><?php echo $item['segment']; ?></td>
			<td><?php echo $item['engine_type']; ?></td>
			<td><?php echo $item['type']; ?></td>
<!--			<td><?php echo $item['displacement']; ?></td>-->
			<td><?php echo $item['sales']; ?></td>
			<td><?php echo $item['origine']; ?></td>
<!--			<td><?php echo $item['body_type']; ?></td>-->
			<td><?php echo $item['rsp']; ?></td>
<!--			<td><?php echo $item['suv_type']; ?></td>-->
			<td><?php echo $item['status']; ?></td>
			<td>
        <?php if($item['status'] == 'ok'): ?>
				<?php echo Html::anchor('admin/items/view/'.$item['id'], 'View'); ?>
        <?php else: ?>
        <?php echo Html::anchor('admin/updates/create', 'Edit'); ?>
        <?php endif; ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?>
<div class="pagination-container">
    <?php echo $pagination; ?>
</div>
