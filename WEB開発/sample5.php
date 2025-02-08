<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="title" content="web開発4回目"/>
</head>
<body>
<?php
for ($i = 100; $i >= 1; $i--) {
    if ($i % 2 == 0) {
        echo $i . "<br>";
    }
}
?>
</body>
</html>