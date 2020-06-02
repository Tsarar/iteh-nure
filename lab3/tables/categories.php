<?php
require "./connection.php";

$sqlSelect = "SELECT * FROM `category`";

$categories = array();

foreach ($dbh->query($sqlSelect) as $cat) {
    $categories[] = array(
    	'id'	=> $cat['id_category'],
        'name' => $cat['name']
    );
}