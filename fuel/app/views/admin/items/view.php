<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Year:</strong>
	<?php echo $item->year; ?></p>
<p>
	<strong>Month:</strong>
	<?php echo $item->month; ?></p>
<p>
	<strong>City:</strong>
	<?php echo $item->city; ?></p>
<p>
	<strong>Group:</strong>
	<?php echo $item->group; ?></p>
<p>
	<strong>Make:</strong>
	<?php echo $item->make; ?></p>
<p>
	<strong>Premium segment:</strong>
	<?php echo $item->premium_segment; ?></p>
<p>
	<strong>Model gnr:</strong>
	<?php echo $item->model_gnr; ?></p>
<p>
	<strong>Model:</strong>
	<?php echo $item->model; ?></p>
<p>
	<strong>Segment:</strong>
	<?php echo $item->segment; ?></p>
<p>
	<strong>Ckd cbu:</strong>
	<?php echo $item->ckd_cbu; ?></p>
<p>
	<strong>Pc cv:</strong>
	<?php echo $item->pc_cv; ?></p>
<p>
	<strong>Engine type:</strong>
	<?php echo $item->engine_type; ?></p>
<p>
	<strong>Type:</strong>
	<?php echo $item->type; ?></p>
<p>
	<strong>Displacement:</strong>
	<?php echo $item->displacement; ?></p>
<p>
	<strong>Sales:</strong>
	<?php echo $item->sales; ?></p>
<p>
	<strong>Origine:</strong>
	<?php echo $item->origine; ?></p>
<p>
	<strong>Body type:</strong>
	<?php echo $item->body_type; ?></p>
<p>
	<strong>Rsp:</strong>
	<?php echo $item->rsp; ?></p>
<p>
	<strong>Suv type:</strong>
	<?php echo $item->suv_type; ?></p>
<p>
	<strong>Price class:</strong>
	<?php echo $item->price_class; ?></p>
<p>
	<strong>Log id:</strong>
	<?php echo $item->log_id; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $item->status; ?></p>

<?php echo Html::anchor('admin/items/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/items', 'Back'); ?>