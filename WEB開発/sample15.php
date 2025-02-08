<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
    </form>
    <?php
    try {
        // データベースへの接続を確立
        $pdo = new PDO('mysql:dbname=mydb;host=localhost;port=8890;charset=utf8', 'root', 'root');
    
        // UPDATE文を準備
        $stmt = $pdo->prepare("UPDATE item SET name = '変更データ' WHERE id = 100");

        // クエリを実行
        $stmt->execute();
    
        echo "データが正常に更新されました。";
    } catch (PDOException $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
    }
    ?>


</body>
</html>