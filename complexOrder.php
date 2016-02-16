<form class="form-horizontal" id="complexOrder" style="display: none;" method="POST">
<fieldset>

<!-- Form Name -->
<input type="hidden" name="orderType" value="Complex" />
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="4x6Glossy">4x6 Glossy</label>
  <div class="col-md-4">
    <select id="4x6Glossy" name="fourBySixGlossyQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['fourBySixGlossyQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="4x6Matte">4x6 Matte</label>
  <div class="col-md-4">
    <select id="4x6Matte" name="fourBySixMatteQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['fourBySixMatteQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="5x7Glossy">5x7 Glossy</label>
  <div class="col-md-4">
    <select id="5x7Glossy" name="fiveBySevenGlossyQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['fiveBySevenGlossyQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="5x7Matte">5x7 Matte</label>
  <div class="col-md-4">
    <select id="5x7Matte" name="fiveBySevenMatteQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['fiveBySevenMatteQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="8x10Glossy">8x10 Glossy</label>
  <div class="col-md-4">
    <select id="8x10Glossy" name="eightByTenGlossyQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['eightByTenGlossyQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="8x10Matte">8x10 Matte</label>
  <div class="col-md-4">
    <select id="8x10Matte" name="eightByTenMatteQuantity" class="form-control">
    <?php
      foreach ($complexDropDownRange as $range) {
        echo '<option value="'.$range.'" '.($_POST['eightByTenMatteQuantity'] == $range ? 'selected="selected"' : '').'>'.$range.'</option>';
      }
      ?>
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="processingTime">Processing Time</label>
  <div class="col-md-4">
    <select id="processingTime" name="processingTime" class="form-control">
      <option value="oneHour" <?php echo (isset($_POST['processingTime']) && $_POST['processingTime'] == 'oneHour' ? 'selected="selected"' : '');?> >One Hour</option>
      <option value="oneDay" <?php echo (isset($_POST['processingTime']) &&  $_POST['processingTime'] == 'oneDay' ? 'selected="selected"' : '');?>>Next Day</option>
    </select>
  </div>
</div>


        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="promotionCode">Promotion Code</label>  
          <div class="col-md-4">
          <input id="promotionCode" name="promotionCode" type="text" placeholder="placeholder" class="form-control input-md" value="<?php if (isset($_POST['promotionCode'])) { echo $_POST['promotionCode']; }?>">
            
          </div>
        </div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id">Action</label>
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-success">Calculate Total</button>
    <button id="button2id" name="button2id" class="btn btn-danger">Reset</button>
  </div>
</div>



</fieldset>
</form>
