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
    <table>
        <tr>
            <th>名産品ID</th>
            <th>商品名</th>
            <th>県名</th>
        </tr>
        <?php
    $pdo=new PDO($connect,USER,PASS);
	$sql=$pdo->prepare('select * from product where id=?');
	$sql->execute([$_POST['id']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="id" value="', $row['id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="sname" value="', $row['sname'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="ken" value="', $row['ken'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
    </table>
    <button onclick="location.href='top.php'">メニューへ戻る</button>
</body>

</html>