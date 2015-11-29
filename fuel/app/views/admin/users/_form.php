<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<fieldset>
			<?php echo Form::hidden('username', Input::post('username', isset($user) ? $user->username : '')); ?>

		<div class="form-group">
			<?php echo Form::label('Current Password', 'password', array('class'=>'control-label')); ?>
			<?php echo Form::password('password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('New Password', 'new_password', array('class'=>'control-label')); ?>
			<?php echo Form::password('new_password', '' , array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>
		</div>

    <div class="form-group">
			<?php echo Form::label('Validate Password', 'password2', array('class'=>'control-label')); ?>
			<?php echo Form::password('password2', '' , array('class' => 'col-md-4 form-control', 'placeholder'=>'Validate Password')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group inline">
				<?php echo Html::anchor('javascript:window.history.go(-1);', 'Back', array('class' => 'btn btn-primary')); ?>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>
