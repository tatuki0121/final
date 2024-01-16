<?php
const SERVER='mysql220.phy.lolipop.lan';
const DBNAME='LAA1517353-final';
const USER='LAA1517353';
const PASS='tatuki0121';

$connect= 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from product  where id=?');
    if ($sql->execute([$_POST['id']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }

?>

    <br>
    <hr><br>
    <table>
        <tr>
            <th>名産品ID</th>
            <th>商品名</th>
            <th>県名</th>
        </tr>
        <?php
    foreach ($pdo->query('select * from product') as $row) {
        echo '<tr>';
        echo '<td>',$row['id'],'</td>';
        echo '<td>',$row['sname'],'</td>';
        echo '<td>',$row['ken'],'</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    <button onclick="location.href='top.php'">メニューへ戻る</button>
</body>

</html>