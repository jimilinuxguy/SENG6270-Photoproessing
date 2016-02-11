<form class="form-horizontal" id="complexOrder" style="display: none;" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Photo Processing</legend>
<input type="hidden" name="orderType" value="Complex" />
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">4x6 Glossy</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">4x6 Matte</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">5x7 Glossy</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">5x7 Matte</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">8x10 Glossy</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">8x10 Matte</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="processingTime">Processing Time</label>
  <div class="col-md-4">
    <select id="processingTime" name="processingTime" class="form-control">
      <option value="oneHour">One Hour</option>
      <option value="nextDay">Next Day</option>
    </select>
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
