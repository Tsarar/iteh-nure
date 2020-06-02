<?php
require "../connection.php";

$sqlSelect = "SELECT `id_items`, `i`.`name`, `price`, `quantity`, `quality`, `FID_Vendor`, `FID_Category`, `v`.name as `vendor_name`, `c`.name as `category_name` 
FROM `items` `i`
JOIN `vendors` `v` on `v`.id_vendor = `i`.`FID_Vendor`
JOIN `category` `c` on `c`.id_category = :category and `c`.id_category = `i`.`FID_Category`
";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':category' => $_GET['category']));

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

echo '<?xml version="1.0" encoding="utf8" ?>';
echo "<root>";
 
foreach ($items as $value) :
	echo "
	<shopItem>
		<id_items>".$value['id_items']."</id_items>
		<name>".$value['name']."</name>
		<price>".$value['price']."</price>
		<quantity>".$value['quantity']."</quantity>
		<quality>".$value['quality']."</quality>
		<FID_Vendor>".$value['FID_Vendor']."</FID_Vendor>
		<FID_Category>".$value['FID_Category']."</FID_Category>
		<vendor_name>".$value['vendor_name']."</vendor_name>
		<category_name>".$value['category_name']."</category_name>
	</shopItem>";
endforeach;
echo "</root>";