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

if (!is_numeric($priceFrom)) {
	echo "Warning! priceFrom is not float! Changing it to 0";
	$priceFrom = 0;
}

if (!is_numeric($priceTo)) {
	echo "Warning! priceTo is not float! Changing it to 10000";
	$priceTo = 10000;
}

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
?>

<table>
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
	<tbody>
		<?php 
			foreach ($items as $value) : ?>
				<tr>
					<td><?php echo $value['id_items']; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['price']; ?></td>
					<td><?php echo $value['quantity']; ?></td>
					<td><?php echo $value['quality']; ?></td>
					<td><?php echo $value['FID_Vendor']; ?></td>
					<td><?php echo $value['FID_Category']; ?></td>
					<td><?php echo $value['vendor_name']; ?></td>
					<td><?php echo $value['category_name']; ?></td>
				</tr>
			<?php endforeach; ?>
	</tbody>
</table>