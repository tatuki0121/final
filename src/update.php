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
    <link rel="stylesheet" href="css/update.css">

</head>

<body>
    <table>
        <tr>
            <th>名産品ID</th>
            <th>商品名</th>
            <th>県名</th>
            <th>操作</th>

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
		echo '<button type="submit">更新</button>';
		echo '</form>';
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