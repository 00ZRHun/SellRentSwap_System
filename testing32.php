<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>trigger demo</title>
  <style>
    button {
      margin: 10px;
    }
    div {
      color: blue;
      font-weight: bold;
    }
    span {
      color: red;
    }
  </style>
  <!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->
</head>
<body>
 
    <form name="form" action="" method="get">
      <!-- <input type='hidden' name='vhid' value='<?= $_GET['vhid']; ?>'>  -->

      <input type='number' class='rentDay' name='rentDay' placeholder="0" /> Day(s)
      <br>
      <!-- RM<input type='number' id='totalPrice' name='totalPrice' placeholder="0.00" disabled /> -->
      <!-- <input type='text' id='totalPrice' name='totalPrice' value="<?= $totalPrice ?>" disabled />
      <input type='text' id='totalPrice' name='totalPrice' value="<?= $id ?>" disabled /> -->
      <button id="primaryButton2" type="submit" onclick="alert('abc')">Check Price</button>
    </form>

    <button id="primaryButton" type="submit"  onclick="document.getElementById('primaryButton2').click()">Check Price2</button>

    <!-- <button onclick="document.getElementById('primaryButton', 'primaryButton2').click()">Rent</button> -->
    <button onclick="document.getElementById('primaryButton').click()">Rent</button>
    <!-- <button id="primaryButton" onclick="alert('abc')">Go to Google</button></a> -->

    
    <!-- <script>
        $( "button" ).last().click(function() {
          $( "button" ).first().trigger( "click" );
        });
    </script> -->
</body>
</html>