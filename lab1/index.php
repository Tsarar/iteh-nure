<?php
require "connection.php";
require "tables/categories.php";
require "tables/vendors.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная 1. Дородных Д. О.</title>
</head>
<body>
    <section class="container">
        
        <!--Первое задание-->
        <h5>Товары выбранного производителя</h5>
        <form action="queries/items-by-vendor.php" class="form-group">
            <select name="vendor">
                <?php
                    foreach ($vendors as $vendor) {
                        echo "<option value=\"". $vendor['id'] ."\">". $vendor['name'] ."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>

        <!--Второе задание-->
        <h5>Товары выбранной категории</h5>
        <form action="queries/items-by-category.php" class="form-group">
            <select name="category">
                <?php
                foreach ($categories as $category) {
                    echo "<option value=\"". $category['id'] ."\">". $category['name'] ."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Отправить">
        </form>

        <!--Третье задание-->
        <h5>Товары в выбранном ценовом диапазоне</h5>
        <form action="queries/items-by-price-range.php" class="form-group">
            <input type="text" name="priceFrom"><br>
            <input type="text" name="priceTo"><br>
            <input type="submit" value="Отправить">
        </form>
    
    </section>
</body>
</html>