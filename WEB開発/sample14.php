<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
    </form>
    <?php
    try {
        // データベースに接続
        $pdo = new PDO('mysql:dbname=mydb;host=localhost;port=8890;charset=utf8', 'root', 'root');
    
        // 挿入するデータ
        $name = '追加データ';
        $id = '1002';
    
        // INSERT文を直接実行
        $pdo->exec("INSERT INTO item (name, id) VALUES ('$name', '$id')");
    
        echo "データが正常に挿入されました。";
    } catch (PDOException $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
    }
    ?>    


</body>
</html>