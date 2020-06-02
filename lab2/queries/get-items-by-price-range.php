<?php

require "../connection.php";

$priceFrom = $_GET['priceFrom'];
$priceTo = $_GET['priceTo'];

$query = ["price" => ['$gte' => intval($priceFrom), '$lt' => intval($priceTo)]];

$cursor = $db->products->find($query, [ 'projection' => ['_id' => 0] ]);
echo json_encode(iterator_to_array($cursor));