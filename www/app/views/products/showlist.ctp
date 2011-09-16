views/products/showlist.ctp
<?php
/*
	echo "<pre>";
	print_r($products);
	echo "</pre>";
*/
?>

<?php foreach($products as $product): ?>
	<h4><?php echo $product['Product']['parts_number'] ?></h4>
	<p><?php echo $product['Product']['name'] ?></p>
	<p><?php echo $product['Product']['description'] ?></p>
	<hr/>
<?php endforeach ?>



