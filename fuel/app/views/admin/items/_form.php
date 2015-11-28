<?php echo Form::open(array("class"=>"form-horizontal")); ?>
    <div class="col-md-5">
	<fieldset>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>

				<?php echo Form::input('year', Input::post('year', isset($item) ? $item->year : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Year')); ?>
            </div>
            
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Month', 'month', array('class'=>'control-label')); ?>

				<?php echo Form::input('month', Input::post('month', isset($item) ? $item->month : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Month')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>

				<?php echo Form::input('city', Input::post('city', isset($item) ? $item->city : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="city"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="city"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Group', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($item) ? $item->group : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Make', 'make', array('class'=>'control-label')); ?>

				<?php echo Form::input('make', Input::post('make', isset($item) ? $item->make : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Make')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="make"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="make"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Premium segment', 'premium_segment', array('class'=>'control-label')); ?>

				<?php echo Form::input('premium_segment', Input::post('premium_segment', isset($item) ? $item->premium_segment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Premium segment')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Model gnr', 'model_gnr', array('class'=>'control-label')); ?>

				<?php echo Form::input('model_gnr', Input::post('model_gnr', isset($item) ? $item->model_gnr : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Model gnr')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Model', 'model', array('class'=>'control-label')); ?>

				<?php echo Form::input('model', Input::post('model', isset($item) ? $item->model : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Model')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="model"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="model"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Segment', 'segment', array('class'=>'control-label')); ?>

				<?php echo Form::input('segment', Input::post('segment', isset($item) ? $item->segment : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="segment"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="segment"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Ckd cbu', 'ckd_cbu', array('class'=>'control-label')); ?>

				<?php echo Form::input('ckd_cbu', Input::post('ckd_cbu', isset($item) ? $item->ckd_cbu : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ckd cbu')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Pc cv', 'pc_cv', array('class'=>'control-label')); ?>

				<?php echo Form::input('pc_cv', Input::post('pc_cv', isset($item) ? $item->pc_cv : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pc cv')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Engine type', 'engine_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('engine_type', Input::post('engine_type', isset($item) ? $item->engine_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Engine type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="engine_type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="engine_type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>

				<?php echo Form::input('type', Input::post('type', isset($item) ? $item->type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Displacement', 'displacement', array('class'=>'control-label')); ?>

				<?php echo Form::input('displacement', Input::post('displacement', isset($item) ? $item->displacement : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Displacement')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Sales', 'sales', array('class'=>'control-label')); ?>

				<?php echo Form::input('sales', Input::post('sales', isset($item) ? $item->sales : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sales')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Origine', 'origine', array('class'=>'control-label')); ?>

				<?php echo Form::input('origine', Input::post('origine', isset($item) ? $item->origine : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Origine')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Body type', 'body_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('body_type', Input::post('body_type', isset($item) ? $item->body_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Body type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="body_type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="body_type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Rsp', 'rsp', array('class'=>'control-label')); ?>

				<?php echo Form::input('rsp', Input::post('rsp', isset($item) ? $item->rsp : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Rsp')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Suv type', 'suv_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('suv_type', Input::post('suv_type', isset($item) ? $item->suv_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Suv type')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Price class', 'price_class', array('class'=>'control-label')); ?>

				<?php echo Form::input('price_class', Input::post('price_class', isset($item) ? $item->price_class : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Price class')); ?>
            </div>
		</div>
            <div class="form-group" style="display: none;">
			<?php echo Form::label('Log id', 'log_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('log_id', Input::post('log_id', isset($item) ? $item->log_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Log id')); ?>

		</div>
		<div class="form-group" style="display: none;">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($item) ? $item->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
        <div class="form-group">
			<label class='control-label'>Validé</label>
            <input class="" type="checkbox" name="validate" value="1" <?php echo ($item->status == 'ok')?'checked="checked"':''?>>				
        </div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
        </div>
	</fieldset>
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