<!-- version 1 -->
<form name="form" action="" method="get">
    <input type="text" name="subject" id="subject" value="Car Loan">
</form>

<?php echo $_GET['subject']; ?>

<!-- version 2 -->
<form name="form" action="" method="post">
  <input type="text" name="subject" id="subject" value="Car Loan">
</form>
<?php echo $_POST['subject']; ?>