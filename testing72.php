<html>
    <head>
        <title>jQuery Sum Demo</title>
    </head>
<body>
    <input type='number' class='rentDay' placeholder="0" /> Day(s)
    <br>
    RM<input type='text' id='totalPrice' placeholder="0.00" disabled /></td>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script>
      // we used jQuery 'keyup' to trigger the computation as the user type
      $('.rentDay').keyup(function () {
      
          // initialize the sum (total price) to zero
          var sum = 0;
          
          // we use jQuery each() to loop through all the textbox with 'price' class
          // and compute the sum for each loop
          $('.rentDay').each(function() {
              sum += (Number($(this).val()) * 10);
          });
          
          // set the computed value to 'totalPrice' textbox
          $('#totalPrice').val(sum);
          
      });
    </script>
</body>
</html>