<?php
/**
 * @var Tender $tender
 */
$tender = $this->getData()['tender'];

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
    <title>Найти тендер</title>
</head>

<body>
<?php
if (null === $tender) {
    ?>
    <form action="http://localhost/tender/src/index.php/main/tender" method="get">
        <div>
            <h3 class="text-center">Найдите тендер по коду</h3>
            <br>
            <div class="form-group">
                <input class="form-control item" type="number" name="code" id="code" placeholder="Код" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block create-account" type="submit">Найти</button>
            </div>
        </div>
    </form>
    <?php
} else {
    ?>
    <table>
        <tr>
            <td style="background: aliceblue"><h2> Внешний код </h2></td>
            <td style="background: aliceblue"><h2> Номер </h2></td>
            <td style="background: aliceblue"><h2> Статус </h2></td>
            <td style="background: aliceblue"><h2> Название </h2></td>
            <td style="background: aliceblue"><h2> Дата изм. </h2></td>
        </tr>
        <tr>
            <td><h2><?= $tender->getCode() ?></h2></td>
            <td><h2><?= $tender->getNumber() ?></h2></td>
            <td><h2><?= $tender->getStatus()->getValue() ?></h2></td>
            <td><h2><?= $tender->getName() ?></h2></td>
            <td><h2><?= $tender->getDateEdit()->format('d.m.Y H:i:s'); ?></h2></td>

        </tr>
    </table>

    <?php
}
?>


</body>
</html>