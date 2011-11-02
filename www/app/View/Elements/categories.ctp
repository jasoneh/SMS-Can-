<?php
/**
 * Render a list of product categories
 * @author Mathias Tervo
 */
?>

<h4>Categories</h4>
<!--<ul>-->
<?php
// retrieve categories returned from method 'all()' in 'categories_controller.php'
$categories = $this->requestAction('categories/all');

foreach($categories as $key => $value):
?>
	<p><?php echo $this->Html->link(__($value, true),
			array('controller' => 'products', 'action' => 'category', $key)
		);
		?>
	</p>
<?php
endforeach;

?>

<!--categories
    categories
    categories
</ul>
-->