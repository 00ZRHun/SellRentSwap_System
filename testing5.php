<!-- <select name="house_model" id="model">
    <option value="">------</option>
    <option value="<?php echo $model1;?>">Model 1</option>
    <option value="<?php echo $model2;?>">Model 2</option>
    <option value="<?php echo $model3;?>">Model 3</option>
</select>

<script type="text/javascript">
    var model= document.getElementById('model');
    alert("You entered: " + model);
</script> -->

<form method="GET" action="foo.php" onChange="getHouseModel">
  <select name="house_model" id="house_model">
    <option value="">------</option>
    <option value="<?php echo $model1;?>">Model 1</option>
    <option value="<?php echo $model2;?>">Model 2</option>
    <option value="<?php echo $model3;?>">Model 3</option>
  </select>
</form>

<script type='text/javascript'>
   function getHouseModel(){
      var model=$('#house_model').val();
      alert(model);
}
</script>