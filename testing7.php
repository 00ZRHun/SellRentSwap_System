<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<input type='number' name='rentDay' value='day(s)'>
                                  <input type='text' id='totalPrice' value='Total Price' disabled />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
 
<script>
  // we used jQuery 'keyup' to trigger the computation as the user type
  $('.rentDay').keyup(function () {
  
      // initialize the sum (total price) to zero
      var sum = 0;
      
      // we use jQuery each() to loop through all the textbox with 'price' class
      // and compute the sum for each loop
      $('.rentDay').each(function() {
          sum += Number($(this).val());
      });
      
      // set the computed value to 'totalPrice' textbox
      $('#totalPrice').val(sum);
      
  });
</script>
</body>
</html>