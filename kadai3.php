<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発10回目</title>
</head>
<body>
    <div>
        <?php
            session_start();
            //db接続
            try {
                $pdo = new PDO('mysql:dbname=mydb;host=localhost;port=8889;charset=utf8', 'root', 'root');
            } catch (PDOException $e) {
                echo 'DB接続エラー: ' . $e->getMessage();
                exit; 
            }
        ?>
        <?php if(isset($_SESSION['username']) && $_SESSION['username']!==''): ?>
            <p>ログイン済み</p>
            <?php 
            if (isset($_POST['logout'])) {
                $_SESSION['username'] = '';
                header("Location:./kadai3.php");
                exit();

            }
            ?>
            <form action="kadai3.php" method="post">
                <button type="submit" name="logout">ログアウト</button>
            </form>
        <?php else: ?>
            <form action="kadai3.php" method="post">
            <p>ユーザーネーム</p>
            <input id="username" type="text" name="username">
            <p>パスワード</p>
            <input id="password" type="password" name="password">
            
            <input type="submit" value="ログイン">
            </form>

            <?php
         if(isset($_POST['username']) && isset($_POST['password'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            try {
                //データを検索
                $records  = $pdo->query("SELECT * FROM login WHERE username='{$username}' AND password='{$password}'"); 
                $message = 'ユーザーネームまたはパスワードが正しくありません';
                foreach ($records as $record) {
                    if($record!=NULL){
                        $message = 'ログイン成功';
                        $_SESSION['username'] = $_POST['username'];
                        header("Location:./kadai3.php");
                        exit();
                    } 
                }
                echo $message;
            }
            catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
        }
            ?>
        
        <?php endif ?>
    </div>
</body>
</html>