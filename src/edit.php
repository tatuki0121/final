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
foreach($pdo->query('select * from 名産品')as $row){
    echo '<tr>';
    echo '<td>',$row['名産品ID'],'</td>';
    echo '<td>',$row['商品名'],'</td>';
    echo '<td>',$row['県名'],'</td>';
    echo '<td>';
    echo '<form action="update.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['名産品ID'],'">';
    echo '<button type="submit">更新</button>';
    echo '</form>';
    echo '</td>';
    echo '<td>';
    echo '<form action="delete.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['名産品ID'],'">';
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