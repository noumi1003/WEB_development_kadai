<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>画像送信フォーム</title>
</head>
<body>
    <h2>画像を送信するフォーム</h2>

    <?php
    // ファイルが正しくアップロードされたかどうかを確認
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imageFile"])) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["imageFile"]["name"]);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // アップロードされたファイルが画像ファイルかどうかをチェック
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imageFileType, $allowedTypes)) {
            // uploads/ ディレクトリが存在するか確認し、なければ作成する
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // 第三引数で再帰的にディレクトリを作成する
            }

            // ファイルの移動とアップロードの確認
            if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $uploadFile)) {
                // アップロードされた画像を表示
                echo "<p>以下の画像が正常にアップロードされました。</p>";
                echo "<p>ファイル名: " . htmlspecialchars($_FILES["imageFile"]["name"]) . "</p>";
                echo "<p>ファイルタイプ: " . htmlspecialchars($_FILES["imageFile"]["type"]) . "</p>";
                echo "<p>ファイルサイズ: " . (int)$_FILES["imageFile"]["size"] . " bytes</p>";
                echo '<img src="' . $uploadFile . '" alt="アップロードされた画像" style="max-width: 500px;">';
            } else {
                echo "<p>ファイルのアップロード中にエラーが発生しました。</p>";
            }
        } else {
            echo "<p>選択されたファイルは画像形式ではありません。jpg, jpeg, png, gif 形式の画像を選択してください。</p>";
        }
    } else {
        // 画像ファイルが選択されていない場合のメッセージ
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>画像ファイルが選択されていません。</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="imageFile">画像ファイルを選択してください：</label>
        <input type="file" id="imageFile" name="imageFile" accept="image/*" required>
        <br><br>
        <input type="submit" value="送信">
    </form>

</body>
</html>