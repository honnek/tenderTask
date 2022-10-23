<?php
/**
 * @var ViewController $this
 */

$page = $this->getData()['page'];
$limit = $this->getData()['limit'];
$countAllTenders = $this->getData()['countAll'];
$orderBy = $this->getData()['orderBy'];
$isAdmin = $this->getData()['isAdmin'];
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/tender/src/css/main.css">
    <link rel="stylesheet" href="http://localhost/tender/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/tender/src/css/main.css">
    <title>Главная</title>
</head>

<body>
<form class="text-xxl-start" action="http://localhost/tender/src/index.php/main/addTender">
    <button type="submit">Добавить тендер</button>
</form>



<?php if ($isAdmin) { ?>
    <form class="text-xxl-end" action="http://localhost/tender/src/index.php/main/logout">
        <button type="submit">Выйти</button>
    </form>
<?php } else { ?>
    <form class="text-xxl-end"  action="http://localhost/tender/src/index.php/main/login">
        <button type="submit">Авторизация</button>
    </form>
<?php } ?>
<ul class="pagination">
    <li class="page-item">
        <a class="page-link" href="?by=date_edit">По дате</a></li>
    <li class="page-item">
        <a class="page-link" href="?by=name">По названию</a></li>
    <li class="page-item">
        <a class="page-link" href="?">Сбросить фильтры</a></li>
</ul>


<table>
    <tr>
        <td style="background: aliceblue"><h2> Внешний код </h2></td>
        <td style="background: aliceblue"><h2> Номер </h2></td>
        <td style="background: aliceblue"><h2> Статус </h2></td>
        <td style="background: aliceblue"><h2> Название </h2></td>
        <td style="background: aliceblue"><h2> Дата изм. </h2></td>
    </tr>

    <?php
    foreach ($this->getData()['tenders'] as $tender) {
        ?>
        <tr>
            <td><h2><?= $tender['code'] ?></h2></td>
            <td><h2><?= $tender['number'] ?></h2></td>
            <td><h2><?= $tender['status'] ?></h2></td>
            <td><h2><?= $tender['name'] ?></h2></td>
            <td><h2><?= $tender['date_edit'] ?></h2></td>

        </tr>
        <?php
    }
    ?>
</table>

<ul class="pagination">
    <li class="page-item">
        <a class="page-link" href="?page=1&by=<?= $orderBy ?>">First</a></li>
    <li class="page-item">
        <a class="page-link" href="<?= ($page <= 1) ? '#&by=$orderBy' : "?by=$orderBy&page=" . ($page - 1); ?>">Prev</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="<?php if ($page * $limit === $countAllTenders) {
            if ($page >= (int)($countAllTenders / $limit) + 1) {
                echo '#';
            }
            {
                echo "?by=$orderBy&page=" . ($page);
            }
        } else {
            if ($page >= (int)($countAllTenders / $limit) + 1) {
                echo '#';
            } else {
                echo "?by=$orderBy&page=" . ($page + 1);
            }
        } ?>">Next</a>
    </li>
    <li class="page-item">
        <a class="page-link"
           href="?by=<?= $orderBy ?>&page=<?= ($countAllTenders % $limit === 0) ? (int)($countAllTenders / $limit) : (int)($countAllTenders / $limit) + 1 ?>">Last</a>
    </li>
</ul>


</body>
</html>