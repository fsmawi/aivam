<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Champ', 'champ', array('class'=>'control-label')); ?>

				<?php echo Form::input('champ', Input::post('champ', isset($champ) ? $champ->champ : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Champ')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Val init', 'val_init', array('class'=>'control-label')); ?>

				<?php echo Form::input('val_init', Input::post('val_init', isset($champ) ? $champ->val_init : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Val init')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Val final', 'val_final', array('class'=>'control-label')); ?>

				<?php echo Form::input('val_final', Input::post('val_final', isset($champ) ? $champ->val_final : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Val final')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($champ) ? $champ->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>