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
	$sql=$pdo->prepare('select * from product where 名産品ID=?');
	$sql->execute([$_POST['名産品ID']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="名産品ID" value="', $row['名産品ID'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="商品名" value="', $row['商品名'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="県名" value="', $row['県名'], '">';
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