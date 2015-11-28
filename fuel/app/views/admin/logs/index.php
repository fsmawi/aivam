<form class="form-horizontal" method="get" action="<?php echo Uri::create('admin'); ?>">

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
    </div>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
        <div class="col-md-4">
            <button type="submit" value="Send" class="btn btn-success" id="submit">Filter</button>
        </div>
    </div>

</form>

<?php if ($current_user_group == 'Administrators') : ?>		
    <div class="form-group doprocess">
        <a href="<?php echo Uri::create('admin/logs/create'); ?>" class="btn btn-primary btn-xs active" role="button">Nouveau traitement</a>
    </div>
<?php endif; ?>

<?php if ($logs): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Year</th>
                <th>Month</th>
                <th>Status</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $item): ?>		<tr>

                    <td><?php echo $item['user']->username; ?></td>
                    <td><?php echo $item['year']; ?></td>
                    <td><?php echo $item['month']; ?></td>
                    <td><?php echo $item['status']; ?></td>
                    <td><?php echo date('d M Y H:i', $item['created_at']); ?></td>
                    <td>
                        <?php echo Html::anchor('admin/items/list/' . $item['id'], 'View'); ?> 
                        <?php if ($current_user_group == 'Administrators') : ?>
                        |<?php echo Html::anchor('admin/logs/delete/' . $item['id'], 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Logs.</p>

<?php endif; ?>
<div class="pagination-container">
    <?php echo $pagination; ?>
</div>