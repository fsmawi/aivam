<?php echo Form::open(array("class"=>"form-horizontal")); ?>
  <!-- Conditions -->  
  <div class="col-md-5">
	<fieldset>
        <h3>Conditions</h3>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Year', 'year', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
                <?php echo Form::input('year', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Year')); ?>
            </div>
            
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Month', 'month', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('month', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Month')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('City', 'city', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('city', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'City')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="city"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="city"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Group', 'group', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('group','', array('class' => 'col-md-4 form-control', 'placeholder'=>'Group')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="group"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="group"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
            <?php echo Form::label('Make', 'make', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('make', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Make')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="make"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="make"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Premium segment', 'premium_segment', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('premium_segment', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Premium segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="premium_segment"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="premium_segment"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Model gnr', 'model_gnr', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('model_gnr', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Model gnr')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="model_gnr"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="model_gnr"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Model', 'model', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('model', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Model')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="model"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="model"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Segment', 'segment', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('segment', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Segment')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="segment"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="segment"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
                <?php echo Form::label('Ckd cbu', 'ckd_cbu', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('ckd_cbu', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Ckd cbu')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="ckd_cbu"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="ckd_cbu"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Pc cv', 'pc_cv', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('pc_cv', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Pc cv')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="pc_cv"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="pc_cv"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Engine type', 'engine_type', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('engine_type', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Engine type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="engine_type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="engine_type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Type', 'type', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('type', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Displacement', 'displacement', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('displacement', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Displacement')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Sales', 'sales', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('sales', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Sales')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Origine', 'origine', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('origine', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Origine')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="origine"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="origine"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Body type', 'body_type', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('body_type', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Body type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="body_type"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="body_type"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Rsp', 'rsp', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('rsp', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Rsp')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Price class', 'price_class', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('price_class', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Price class')); ?>
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
			<?php echo Form::label('Year', 'year2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('year2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Year')); ?>
            </div>
            
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Month', 'month2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('month2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Month')); ?>
            </div>
		</div>
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
			<?php echo Form::label('Group', 'group2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('group2','', array('class' => 'col-md-4 form-control', 'placeholder'=>'Group')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="group2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="group2"><span class="glyphicon glyphicon-edit"></span></a>
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
                <a class="newitem" data-item="premium_segment2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="premium_segment2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Model gnr', 'model_gnr2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('model_gnr2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Model gnr')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="model_gnr2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="model_gnr2"><span class="glyphicon glyphicon-edit"></span></a>
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
                <?php echo Form::label('Ckd cbu', 'ckd_cbu2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('ckd_cbu2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Ckd cbu')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="ckd_cbu2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="ckd_cbu2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">			
            <?php echo Form::label('Pc cv', 'pc_cv2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('pc_cv2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Pc cv')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="pc_cv2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="pc_cv2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Engine type', 'engine_type2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('engine_type2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Engine type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="engine_type2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="engine_type2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Type', 'type2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('type2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Type')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="type2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="type2"><span class="glyphicon glyphicon-edit"></span></a>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Displacement', 'displacement2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('displacement2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Displacement')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Sales', 'sales2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('sales2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Sales')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Origine', 'origine2', array('class'=>'control-label')); ?>  
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('origine2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Origine')); ?>
            </div>
            <div class="col-md-2 check-context actions">
                <a class="newitem" data-item="origine2"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a class="finditem" data-item="origine2"><span class="glyphicon glyphicon-edit"></span></a>
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
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Rsp', 'rsp2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('rsp2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Rsp')); ?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-md-9">
			<?php echo Form::label('Price class', 'price_class2', array('class'=>'control-label')); ?>
                <span class="glyphicon glyphicon-plus input-control"></span>
				<?php echo Form::input('price_class2', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Price class')); ?>
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