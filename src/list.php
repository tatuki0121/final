<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/list.css">

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
    echo '</tr>';
    echo "\n";
}
?>
    </table>
</body>

</html>