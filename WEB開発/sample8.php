<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title>web開発4回目</title>
</head>
<body>
<?php
$fruits = [
    'りんご' => 'apple',
    'レモン' => 'lemon',
    'ブドウ' => 'grape',
    'トマト' => 'tomato'
];

foreach ($fruits as $japanese => $english) {
    echo '日本語:'.$japanese . '英語' . $english . '<br>';
}
?>
</body>
</html>