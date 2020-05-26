<input type="submit" name="savebutton" class="first" />
<!-- <input type="submit" name="savebutton" class="first" onclick="document.getElementById(').click();" /> -->
<input type="submit" name="savebutton" class="second" onclick="alert('Hello')"/>


<script>
  $(".first").click(function(){
    alert('Hello');
    // $(".second").click(); 
    // return false;
  });
</script>