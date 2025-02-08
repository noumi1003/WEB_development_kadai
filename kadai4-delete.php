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
            $msg = '';
            if (isset($_POST['id'])){
                if (gettype($_POST['id'])!=='string'){
                    $id = implode($_GET['id']);
                }
                else {
                    $id = $_POST['id'];
                }
            }
            if (isset($_GET['id'])){
                if (gettype($_GET['id'])!=='string'){
                    $id = implode($_GET['id']);
                }
                else {
                    $id = $_GET['id'];
                }
            }
                if (isset($_POST['password'])){
                    if ($_POST['password']==='password'){
                        try {
                            //データを取得
                            $posts  = $pdo->query("DELETE FROM posts WHERE id='{$_POST['id']}'"); 
                            $msg='削除しました';
        
                        } catch (PDOException $e) {
                            echo 'クエリエラー: ' . $e->getMessage();
                        }
                    } else {
                        $msg='パスワードが間違っています';
                    }
                }
                    
        ?>
            <form action="kadai4-delete.php" method="post">
                <input type='hidden' name='id' value='<?php echo $id ?>'>
                <p>パスワード</p>
                <input id="password" type="password" name="password">
                <p></p>
                <input type="submit" value="削除する">
            </form>      
            <p><?php echo $msg; ?></p>

</body>
</html>