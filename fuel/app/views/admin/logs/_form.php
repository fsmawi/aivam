<?php echo Form::open(array("class"=>"form-horizontal", 'enctype'=>"multipart/form-data")); ?>

	<fieldset>

        <div class="form-group">
            <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Fichier brute...</span>
              <!-- The file input field used as target for the file upload widget -->
              <input id="fileupload" type="file" name="files[]" multiple>
            </span>
            <br>
            <br>
            <!-- The global progress bar -->
            <div id="progress" class="progress">
              <div class="progress-bar progress-bar-success"></div>
            </div>
            <!-- The container for the uploaded files -->
            <div id="files" class="files"></div>
            <?php echo Form::hidden('fichier_brute', null, array('id' => 'fichier_brute')) ?>

        </div>
        <div class="form-group">
			<?php //echo Form::label('Fichier brute', 'f_brut', array('class'=>'control-label')); ?>
			<?php //echo Form::file('f_brut', array('class' => 'col-md-4 form-control', 'placeholder'=>'Fichier brute')); ?>
		</div>
        <div class="form-group">
            <div class="col-md-2">
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox-inline sort-by">Année </label>
                            <select name="year" class="form-control" id="sort-liste">
                                <?php
                                for ($i=2006; $i <= $current_year; $i++):
                                ?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                                endfor;
                                ?>
                            </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox-inline sort-by">Mois </label>
                            <select name="month" class="form-control" id="sort-liste">
                                <?php
                                for ($j=1; $j <= 12; $j++):
                                ?>
                                <option value="<?php echo $j;?>"><?php echo $j;?></option>
                                <?php
                                endfor;
                                ?>
                            </select>

                    </div>
                </div>
            </div>
        </div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>

<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '/server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                $('#files').text(file.name);
                $('#fichier_brute').val(file.name);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
