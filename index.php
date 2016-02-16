<html>
    <head>
        <title>Photo Order</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-2.2.0.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    </head>
    <body>

<div class="container-fluid">
    <div class="row">
        <form class="form-horizontal">
        <div class="form-group">
          <label class="col-md-4 control-label" for="processingType">Interface Mode</label>
          <div class="col-md-4">
            <select id="processingType" name="processingType" class="form-control">
              <option value="Simple">Simple (Mode1)</option>
              <option value="Complex">Complex (Mode 2)</option>
            </select>
          </div>
        </div>
        </form>
    </div>

<?php 
    $complexDropDownRange = range(0, 100);
?>

<?php include_once 'simpleOrder.php'; ?>
<?php include_once 'complexOrder.php'; ?>

<?php

if ($_POST) {
    include_once 'PhotoProcessorSimple.php';
    include_once 'PhotoProcessorComplex.php';

    if ($_POST['orderType'] == 'Simple') {
        $photoProc = new PhotoProcessorSimple( (object) $_POST);
    } else {
        $photoProc = new PhotoProcessorComplex((object) $_POST);
    }
    ?>
    <div class="row">
  <div class="col-xs-6 col-md-4"></div>
        <div class="alert alert-success col-md-2">
           <strong>Total:</strong> <?php echo $photoProc->getTotal(); ?>
        </div>

  <div class="col-xs-6 col-md-4"></div>
    </div>
    <?php
}
?>


<script>
$(document).ready(function(){
    $('#processingType').on('change', function(){

        $('#simpleOrder').hide();
        $('#complexOrder').hide();

        if ( $('#processingType').val() == 'Simple') {
            $('#simpleOrder').show();
        } else {
            $('#complexOrder').show();
        }

    });

    <?php
    if (isset($_POST['orderType'])) {
        echo "$('#processingType').val('".$_POST['orderType']."').trigger('change'); ";
    }
    ?>
});
</script>
</div>
    </body>
</html>