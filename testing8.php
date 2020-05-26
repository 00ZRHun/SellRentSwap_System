<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <script> document.cookie = "myJavascriptVar = " + myJavascriptVar </script>
    <?php
        $myPhpVar= $_COOKIE['myJavascriptVar'];
        echo $myPhpVar;
    ?>
</body>
</html>