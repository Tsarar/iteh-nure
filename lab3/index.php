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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="ajax/ajax.js"></script>

    <title>Лабораторная 3. Дородных Д. О.</title>
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
            <input type="button" value="Отправить" onclick="itemsByVendor(this)">
        </form>
        <div id="result1"></div>

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
            <input type="button" value="Отправить" onclick="itemsByCategory(this)">
        </form>
        <table id="result2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Качество</th>
                    <th>FID_Vendor</th>
                    <th>FID_Category</th>
                    <th>Производитель</th>
                    <th>Категория</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>


        <!--Третье задание-->
        <h5>Товары в выбранном ценовом диапазоне</h5>
        <form action="queries/items-by-price-range.php" class="form-group">
            <input type="text" id="priceFrom" name="priceFrom"><br>
            <input type="text" id="priceTo" name="priceTo"><br>
            <input type="button" value="Отправить" onclick="itemsByPriceRange(this)">
        </form>
        <table id="result3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Качество</th>
                    <th>FID_Vendor</th>
                    <th>FID_Category</th>
                    <th>Производитель</th>
                    <th>Категория</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>
</body>
</html>