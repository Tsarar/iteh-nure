<?php
require "./connection.php";

$sqlSelect = "SELECT * FROM `vendors`";

$vendors = array();

foreach ($dbh->query($sqlSelect) as $vendor) {
    $vendors[] = array(
        'id' => $vendor['id_vendor'],
        'name' => $vendor['name']
    );
}