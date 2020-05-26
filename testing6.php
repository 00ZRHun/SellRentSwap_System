<!-- ajax( real-time update ) -->
<html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){

    $('input').click(function(){
      
      $.ajax({
        url: 'http://localhost:8888/Renting%20System/SellRentSwap_System/load.php',
        success: function(data) {
          
          $('p').append(data);
        }
      });
    });
  });

</script>

</head>
<body>

<p></p>

<input type="button" value="reload" />

</body>
</html>
