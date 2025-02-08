<!DOCTYPE html>
<html>
<head>
<title>名前送信フォーム</title>
</head>
<body>
<?php
       // POSTデータを受け取る
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $name = $_POST['name'];
           // 受け取ったデータを表示する
           echo "<h1>名前: $name </h1>";
       }
   ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label for="name">お名前:</label>
<input type="text" id="name" name="name" required>
<br>
<input type="submit" value="送信">
</form>
</body>
</html>