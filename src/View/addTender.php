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
<form action="http://localhost/project/src/index.php/main/AddTask" method="post">
   <div>
      <h3 class="text-center">Задайте новый тендер</h3>
      <div class="form-group">
          <input class="form-control item" type="text" name="user" id="user" placeholder="Внешний код"
       </div>
     <div class="form-group">
           <input class="form-control item" type="text" name="email" id="email" placeholder="Номер" required>
       </div>
        <div class="form-group">
            <input class="form-control item" type="text" name="text" id="text" placeholder="Статус" required>
        </div>
       <div class="form-group">
           <input class="form-control item" type="text" name="text" id="text" placeholder="Название" required>
       </div>
       <div class="form-group">
           <input class="form-control item" type="text" name="text" id="text" placeholder="Дата изм." required>
       </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block create-account" type="submit">Добавить задачу</button>
        </div>
    </div>
</form>

</body>
</html>

