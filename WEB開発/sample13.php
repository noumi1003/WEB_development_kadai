<body>
    <div>
        <?php
            try {
                $db = new PDO('mysql:dbname=mydb;host=localhost;port=8889;charset=utf8', 'root', 'root');
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
                exit; 
            }

            try {
                $query = $db->query('SELECT * FROM items'); 
                $records = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($records as $record) {
                    echo $record['id'], $record['name']. '<br>';
                }
            } catch (PDOException $e) {
                echo 'クエリエラー: ' . $e->getMessage();
            }
        ?>
    </div>
</body>