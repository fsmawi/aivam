<form class="form-horizontal" method="post" action="<?php echo Uri::create('admin/export');?>">

    <!-- Button -->
    <div class="form-group">
        <div class="col-md-2">
            <button type="submit" value="Export" class="btn btn-primary btn-sm btn-block" id="submit">Export</button>
        </div>
    </div>

    <div class="form-group">
      <div class="row">
        <?php
        for ($i=2006; $i <= $current_year; $i++):
        ?>
          <div class="col-md-1">

            <div class="control-group">
              <div class="controls">
                <label class="checkbox-years" for="checkboxes-0">
                  <input type="checkbox" class="checkboxes-years" name="years[]" id="checkboxes-<?php echo $i;?>" value="<?php echo $i;?>">
                  <?php echo $i;?>
                </label>
                <?php
                for ($j=1; $j<=12; $j++):
                ?>
                <label class="checkbox" for="checkboxes-0">
                  <input type="checkbox" name="month_<?php echo $i;?>[]" class="checkboxes-<?php echo $i;?>" id="checkboxes-<?php echo $i;?>-<?php echo $j;?>" value="<?php echo $j;?>">
                  <?php echo $j;?>
                </label>
                <?php
                  endfor;
                  ?>
              </div>
            </div>
          </div>
        <?php
        endfor;
        ?>
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="col-md-2">
            <button type="submit" value="Export" class="btn btn-primary btn-sm btn-block" id="submit">Export</button>
        </div>
    </div>

</form>
