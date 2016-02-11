<html>
    <head>
        <title>Photo Order</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-2.2.0.js"></script>

    </head>
    <body>

<form class="form-horizontal">
<div class="form-group">
  <label class="col-md-4 control-label" for="processingType">Interface Type</label>
  <div class="col-md-4">
    <select id="processingType" name="processingType" class="form-control">
      <option value="Simple">Simple</option>
      <option value="Complex">Complex</option>
    </select>
  </div>
</div>
</form>


<?php include_once 'simpleOrder.php'; ?>
<?php include_once 'complexOrder.php'; ?>

<?php

if ($_POST) {
    include_once 'PhotoProcessorSimple.php';

    if ($_POST['orderType'] == 'Simple') {
        $photoProc = new PhotoProcessorSimple( (object) $_POST);
    } else {
        $photoProc = new PhotoProcessorComplex((object) $_POST);
    }

    echo $photoProc->getTotal();
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
});
</script>
    </body>
</html>