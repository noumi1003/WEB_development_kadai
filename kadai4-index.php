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
            if (isset($_POST['name'])){
                $date_time = new DateTime(); 
                $date_time_disp = $date_time->format("Y-m-d H:i");
                try {
                    //データを挿入
                    $records  = $pdo->query("INSERT INTO posts(id,name,content,created_at,tag_id,updated_at) VALUES(NULL,'{$_POST['name']}','{$_POST['content']}','{$date_time_disp}','{$_POST['tag']}','{$date_time_disp}')");
                    header("Location:./kadai4-index.php");
                    exit();
                } catch (PDOException $e) {
                    echo 'クエリエラー: ' . $e->getMessage();
                }
            }
            

        ?>
            <form action="kadai4-addpost.php" method="post">
                <input type="submit" value="投稿する">
            </form>
            <form action="kadai4-posts.php" method="post">
                <input type="submit" value="投稿一覧">
            </form>
            <form action="kadai4-addtag.php" method="post">
                <input type="submit" value="タグ追加・削除">
            </form> 
            <form action="kadai4-searchtag.php" method="post">
                <input type="submit" value="タグで検索">
            </form>                         

</body>
</html>