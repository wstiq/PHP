<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="index.php" method="get">
    <textarea style="width: 120px; height: 40px" name="text" placeholder="Enter your text"><?php if(isset($_COOKIE['string'])){echo $_COOKIE['string'];}?></textarea>
    <br>
    <input type="submit" name="send" value="Redirect">
</form>

</body>
</html>