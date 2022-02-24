<?php
    $conn        = new mysqli( "localhost", "root", "root", "test" );
    $routerTypes = $conn->query("SELECT code, name FROM router_types");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <form id="routersData">
            <div class="container">
                <div class="label">Серийные номера</div>
                <textarea name="serials" cols="30" rows="10" class="serial-numbers"></textarea>
            </div>
            <div class="container">
                <div class="label">Тип оборудования</div>
                <select name="routerCode" class="equips">
                    <?php foreach ($routerTypes as $routerType):?>
                        <option value="<?=$routerType['code']?>" class="equip"><?=$routerType['name']?></option>
	                <?php endforeach;?>
                </select>
            </div>
            <div class="container">
                <button id="submitRoutersData" class="submit-button">Добавить</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>