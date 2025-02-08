<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課題4</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <?php
            //db接続
            try {
                $pdo = new PDO('mysql:dbname=blog;host=localhost;port=8889;charset=utf8', 'root', 'root');
            } catch (PDOException $e) {
                echo 'DB接続エラー: ' . $e->getMessage();
                exit; 
            }
            try {
                //データを取得
                $tags  = $pdo->query('SELECT * FROM tags'); 

            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
            if (isset($_POST['tagname'])){
                try {
                    //データを挿入
                    $records  = $pdo->query("INSERT INTO tags(tagid,tagname) VALUES(NULL,'{$_POST['tagname']}')");
                    header("Location:./kadai4-addtag.php");
                    exit();
                
                } catch (PDOException $e) {
                    echo 'クエリエラー: ' . $e->getMessage();
                }
            }
            if (isset($_POST['deltag'])){
                try {
                    //データを挿入
                    $records  = $pdo->query("DELETE FROM tags WHERE tagid='{$_POST['deltag']}'");
                    header("Location:./kadai4-addtag.php");
                    exit();
                
                } catch (PDOException $e) {
                    echo 'クエリエラー: ' . $e->getMessage();
                }
            }
        
        ?>
            <form action="kadai4-addtag.php" method="post">
                <h2>タグ追加</h2>
                <p>タグ名</p>
                <input id="tagname" type="text" name="tagname">
                <input type="submit" value="追加">
            </form>
            <form action="kadai4-addtag.php" method="post">       
                <h2>タグ削除</h2>
                <select name="deltag" id="deltag">
                <option value="">--タグを選択してください--</option>
                <?php foreach ($tags as $tag):?>
                <option value="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></option>
                <?php endforeach ?>
                </select>
                <input type="submit" value="削除">
            </form>       

</body>
</html>