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
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('insert into 名産品(商品名,県名) values (?,?)');
if(empty($_POST['商品名'])){
    echo '商品名を入力してください。';
}else if(empty($_POST['県名'])){
    echo '県名を入力してください。';
}
else if($sql->execute([$_POST['商品名'],$_POST['県名']])){
    echo '<font color="red">追加に成功しました。</font>';
}else{
    echo '<font color="red">追加に失敗しました。</font>';
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
    echo '</tr>';
    echo "\n";
}
?>
    </table>
    <form action="top.php" method="post">
        <button type="submit">メニュー画面に戻る</button>
    </form>

</body>

</html>