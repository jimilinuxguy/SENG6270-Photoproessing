            <form class="form-horizontal" id="simpleOrder" method="POST">
        <fieldset>

        <!-- Form Name -->

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="photoSize">Photo Size</label>
          <div class="col-md-4">
            <select id="photoSize" name="photoSize" class="form-control">
              <option value="4x6" <?php echo (isset($_POST['photoSize']) && $_POST['photoSize'] == '4x6' ? "selected='selected'" : '')?> >4x6</option>
              <option value="5x7" <?php echo (isset($_POST['photoSize']) && $_POST['photoSize'] == '5x7' ? "selected='selected'" : '')?>>5x7</option>
              <option value="8x10" <?php echo (isset($_POST['photoSize']) && $_POST['photoSize'] == '8x10' ? "selected='selected'" : '')?>>8x10</option>
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="photoQuantity">Photo Quantity</label>
          <div class="col-md-4">
            <select id="photoQuantity" name="photoQuantity" class="form-control">
              <?php
                foreach(range(1,100) as $quantity) {
                  echo '<option value="'.$quantity.'" '.(isset($_POST['photoQuantity']) && $_POST['photoQuantity'] == $quantity ? 'selected="selected"' : '').'>'.$quantity.'</option>';
                }
              ?>
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="photoFinish">Finish</label>
          <div class="col-md-4">
            <select id="photoFinish" name="photoFinish" class="form-control">
              <option value="Glossy" <?php echo (isset($_POST['photoFinish']) && $_POST['photoFinish'] == 'Glossy' ? 'selected="selected"' : '');?> >Glossy</option>
              <option value="Matte" <?php echo (isset($_POST['photoFinish']) && $_POST['photoFinish'] == 'Matte' ? 'selected="selected"' : '');?>>Matte</option>
            </select>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="processingTime">Processing Time</label>
          <div class="col-md-4">
            <select id="processingTime" name="processingTime" class="form-control">
              <option value="oneHour" <?php echo (isset($_POST['processingTime']) &&$_POST['processingTime'] == 'oneHour' ? 'selected="selected"' : '');?> >One Hour</option>
              <option value="oneDay" <?php echo (isset($_POST['processingTime']) && $_POST['processingTime'] == 'oneDay' ? 'selected="selected"' : '');?>>Next Day</option>
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
          <label class="col-md-4 control-label" for="button1id">Actions</label>
          <div class="col-md-8">
            <button id="button1id" name="button1id" class="btn btn-success">Calculate Total</button>
            <button id="button2id" name="button2id" class="btn btn-danger">Reset</button>
          </div>
        </div>
<input type="hidden" name="orderType" value="Simple" />
        </fieldset>
        </form>
