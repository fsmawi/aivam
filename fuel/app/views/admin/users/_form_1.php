<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
			<?php echo Form::hidden('username', Input::post('username', isset($user) ? $user->username : '')); ?>

		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

		</div>
        <div class="form-group">
			<?php echo Form::label('Validate Password', 'password2', array('class'=>'control-label')); ?>

				<?php echo Form::input('password2', Input::post('password2', ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Validate Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
