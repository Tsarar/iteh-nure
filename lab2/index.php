<?php
require 'connection.php';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная 3. Дородных Д.О.</title>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="ajax/ajax.js"></script>
    
    <style>tr,td,th{padding: 10px;}</style>
</head>
<body>
    <section class="container">
        <!--Первое задание-->
        <h5>Перечень производителей, с которыми работает магазин</h5>
        <form action="queries/get-vendors-list.php" class="form-group">
            <input type="button" value="Отправить" onclick="vendors(this)">
            <input type="button" value="Данные с LocalStorage" onclick="vendorsLocal(this)">
        </form>
        <div id="result1"></div>
        <div id="result1local" style="display: none">
            <span>Local storage:</span>
            <div id="result1localinternal"></div>
        </div>

        <!--Второе задание-->
        <h5>Товары, отсутствующие на складе (т.е. вообще они есть, но сейчас количество 0)</h5>
        <form action="queries/get-missing-goods-list.php" class="form-group">
            <input type="button" value="Отправить" onclick="missingGoods(this)">
            <input type="button" value="Данные с LocalStorage" onclick="missingGoodsLocal(this)">
        </form>
        <table id="result2">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Производитель</th>
                    <th>Категория</th>
                    <th>Отзывы</th>
                    <th>Качество</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="result2local" style="display: none">
            <span>Local storage:</span>
            <table id="result2localinternal">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Производитель</th>
                        <th>Категория</th>
                        <th>Отзывы</th>
                        <th>Качество</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>


        <!--Третье задание-->
        <h5>Товары в выбранном ценовом диапазоне</h5>
        <form action="queries/get-items-by-price-range.php" class="form-group">
            <input type="text" id="priceFrom" name="priceFrom"><br>
            <input type="text" id="priceTo" name="priceTo"><br>
            <input type="button" value="Отправить" onclick="itemsByPriceRange(this)">
            <input type="button" value="Данные с LocalStorage" onclick="itemsByPriceRangeLocal(this)">
        </form>
        <table id="result3">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Производитель</th>
                    <th>Категория</th>
                    <th>Отзывы</th>
                    <th>Качество</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <div id="result3local" style="display: none">
            <span>Local storage:</span>
            <table id="result3localinternal">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Производитель</th>
                        <th>Категория</th>
                        <th>Отзывы</th>
                        <th>Качество</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>
</body>
</html>