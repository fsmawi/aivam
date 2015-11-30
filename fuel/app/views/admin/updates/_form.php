<?php echo Form::open(array("class"=>"form-horizontal")); ?>
  <!-- Conditions -->
  <div class="col-md-5">
	<fieldset>
        <h3>Conditions</h3>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('city', isset($city)?$city:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="city"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="city"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Make', 'make', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('make', isset($make)?$make:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'Make')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="make"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="make"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Premium segment', 'premium_segment', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('premium_segment', isset($premium_segment)?$premium_segment:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'Premium segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="premium_segment"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="premium_segment"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Model', 'model', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('model', isset($model)?$model:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'Model')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="model"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="model"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Segment', 'segment', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('segment', isset($segment)?$segment:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'Segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="segment"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="segment"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Body type', 'body_type', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('body_type', isset($body_type)?$body_type:'', array('class' => 'col-md-4 form-control', 'placeholder'=>'Body type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="body_type"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="body_type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
	</fieldset>
  </div>
  <!-- end conditions -->
  <!-- changes -->
  <div class="col-md-5 changes">
	<fieldset>
        <h3>Changes</h3>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('City', 'city2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('city2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="city2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="city2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Make', 'make2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('make2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Make')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="make2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="make2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Premium segment', 'premium_segment2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('premium_segment2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Premium segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <!-- <a class="newitem" data-item="premium_segment2"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
                <a class="finditem" data-item="premium_segment2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Model', 'model2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('model2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Model')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="model2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="model2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Segment', 'segment2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('segment2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="segment2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="segment2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Body type', 'body_type2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('body_type2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Body type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="body_type2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="body_type2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
	</fieldset>
    </div>
  <div class="clr"></div>
  <!-- end changes -->
  <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

<?php echo Form::close(); ?>
<div class="clr"></div>

<div class="modal fade" id="item_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-title" class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
