<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>addTender</title>
</head>
<body>
<form action="http://localhost/tender/src/index.php/main/AddTender" method="post">
   <div>
      <h3 class="text-center">Задайте новый тендер</h3>
      <div class="form-group">
          <input class="form-control item" type="text" name="code" id="code" placeholder="Внешний код"
       </div>
     <div class="form-group">
           <input class="form-control item" type="number" name="number" id="number" placeholder="Номер" required>
       </div>
        <div class="form-group">
            <input class="form-control item" type="text" name="status" id="status" placeholder="Статус" required>
        </div>
       <div class="form-group">
           <input class="form-control item" type="text" name="name" id="name" placeholder="Название" required>
       </div>
       <div class="form-group">
           <input class="form-control item" type="date" name="date" id="date" placeholder="Дата изм." required>
       </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block create-account" type="submit">Добавить тендер</button>
        </div>
    </div>
</form>

</body>
</html>

