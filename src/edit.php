<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h1>名産品情報一覧</h1>

    <a href="top.php">メニューに戻る</a>
    <hr>
    <button onclick="location.href='register-input.php'">商品を登録する</button>
    <table>
        <tr>
            <th>名産品ID</th>
            <th>商品名</th>
            <th>県名</th>
            <th>更新</th>
            <th>削除</th>
        </tr>
        <?php
$pdo=new PDO(
    'mysql:host=mysql220.phy.lolipop.lan;dbname=LAA1517353-final;charset=utf8',
    'LAA1517353',
    'tatuki0121'
);
foreach($pdo->query('select * from product')as $row){
    echo '<tr>';
    echo '<td>',$row['id'],'</td>';
    echo '<td>',$row['sname'],'</td>';
    echo '<td>',$row['ken'],'</td>';
    echo '<td>';
    echo '<form action="update.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['id'],'">';
    echo '<button type="submit">更新</button>';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form action="delete.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['id'],'">';
    echo '<button type="submit">削除</button>';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
    echo "\n";
  
}
?>
    </table>
</body>

</html>