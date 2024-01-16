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
    $sql=$pdo->prepare('update  product set sname=?,ken=? where id=?');
    // SQL発行準備 prepareメソッド　作成２
    if (empty($_POST['sname'])) {
        echo '商品名を入力してください。';
    } else
    if  (empty($_POST['ken'])) {
        echo '県名を入力してください。';
    } else
   
    if ($sql->execute([htmlspecialchars($_POST['sname']),$_POST['ken'],$_POST['id']])) {
        echo '更新に成功しました。';
    } else{
        echo '更新に失敗しました。';
    }

    
?>
    <hr>
    <table>
        <tr>
            <th>名産品ID</th>
            <th>商品名</th>
            <th>県名</th>
        </tr>

        <?php
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
    <button onclick="location.href='top.php'">メニューへ戻る</button>
</body>

</html>