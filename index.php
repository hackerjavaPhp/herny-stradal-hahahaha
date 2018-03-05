<?php
//    $sql_basa = new mysqli("localhost", "root", "", "kinomonster");
//
//    if(mysqli_connect_errno()) {
//        printf("ошибка", mysqli_connect_errno());
//        exit();
//    }
//
//    $sql_basa -> set_charset("utf-8");

//    $query = $sql_basa -> query("SELECT * FROM films");
//
//    while ($row = mysqli_fetch_assoc($query)) {
//        echo $row["name"];
//    }

//    $query = "INSERT INTO films VALUES(null, \"Безумный Макс\", \"Преследуемый призраками беспокойного прошлого, Макс уверен, что лучший способ выжить — скитаться в одиночестве. Несмотря на это, он присоединяется к бунтарям, бегущим через всю пустыню на боевой фуре, под предводительством военачальника Фуриосы.\", 2015, Now())";
//
//    $sql_basa -> query($query);

//    $query = "UPDATE films SET year = 2001 WHERE id = 1";
//
//    $sql_basa -> query($query);

//    $query = "DELETE FROM films WHERE id = 5";
//
//    $sql_basa -> query($query);

//    $sql_basa -> close();

$sql_basa = new mysqli("localhost", "root", "", "kinomonster");
$sql_basa -> set_charset("utf-8");

if(mysqli_connect_errno()) {
    printf("ошибка", mysqli_connect_errno());
    exit();
}

if (!empty($_POST["name"]) && !empty($_POST["text"]) && !empty($_POST["year"])) {
    $query = "INSERT INTO films VALUES(null,'.$_POST[name].' ,'.$_POST[text].' ,'.$_POST[year].' , Now())";
    $sql_basa -> query($query);
}

$query = $sql_basa -> query("SELECT * FROM films");

$sql_basa -> close();


?>
<!DOCTYPE html>
<html>
<head>
    <title>miniAdmin 0.1.1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <div class="main">

        <!-- Show element Table || Form -->
        <div class="main-showElement">
           <button id = "main-show-table" class="js-main-show-table">Показать список</button>
           <button id="main-show-form" class="js-main=show-form">Добавить в список</button>
        </div>

        <!-- Table -->
        <div class="js-main-wpTable" id="main-wpTable" style="display: none">
            <table>
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>О чем фильм</th>
                        <th>Год</th>
                        <th>Опубликованно</th>
                    </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $row["name"]?></td>
                                <td><?php echo $row["text"]?></td>
                                <td><?php echo $row["year"]?></td>
                                <td><?php echo $row["add_date"]?></td>
                            </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>

        <!-- form -->
        <div class="js-main-insertInfo" id="main-insertInfo">
            <form action = "/" method="POST">
                <input type="text" name="name">
                <input type="text" name="text">
                <input type="date" name="year">
                <input type="submit">
            </form>
        </div>
    </div>

<script src="main.js"></script>
</body>
</html>