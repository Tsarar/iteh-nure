<?php

require "../connection.php";

$cursor = $db->products->find(["amount" => 0], [ 'projection' => ['_id' => 0] ]);
echo json_encode(iterator_to_array($cursor));