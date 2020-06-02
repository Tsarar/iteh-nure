<?php

require "../connection.php";

$cursor = $db->products->distinct("vendor");
echo json_encode($cursor);
