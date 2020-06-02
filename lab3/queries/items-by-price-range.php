<?php
require "../connection.php";

$sqlSelect = "SELECT `id_items`, `i`.`name`, `price`, `quantity`, `quality`, `FID_Vendor`, `FID_Category`, `v`.name as `vendor_name`, `c`.name as `category_name` 
FROM `items` `i`
JOIN `vendors` `v` on `v`.id_vendor = `i`.`FID_Vendor`
JOIN `category` `c` on `c`.id_category = `i`.`FID_Category`
WHERE `price` >= :priceFrom and `price` < :priceTo
";

$priceFrom = $_GET['priceFrom'];
$priceTo = $_GET['priceTo'];

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':priceFrom' => $priceFrom, ':priceTo' => $priceTo));

$items = array();
foreach ($sth as $index => $row) {
	$items[] = array(
		'id_items' => $row['id_items'],
		'name' => $row['name'],
		'price' => $row['price'],
		'quantity' => $row['quantity'],
		'quality' => $row['quality'],
		'FID_Vendor' => $row['FID_Vendor'],
		'FID_Category' => $row['FID_Category'],
		'vendor_name' => $row['vendor_name'],
		'category_name' => $row['category_name'],
	);
}
echo json_encode($items);
?>
