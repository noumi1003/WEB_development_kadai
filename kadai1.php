<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <meta name="title" content="web開発4回目"/>
    </head>
    <body>
    <table border="1" width="300">
    <tr><th>購入商品</th><th>個数</th><th>料金</th></tr>
    <tr><td>りんご</td><td>2</td><td>100円</td></tr>
    <tr><td>お肉</td><td>1</td><td>1000円</td></tr>
    <tr><td>卵</td><td>2</td><td>200円</td></tr>
    </table>
    <?php
        $total = 100*2 + 1000 + 200*2;
        print("全合計金額<br>");
        print('税抜き: '. $total. "円<br>");
        print('税込み: '. $total*1.08. "円<br>");
    ?>

    </body>
</html>