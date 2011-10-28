<?php
/**
 * Render a paginated list of featured products
 * @author Mathias Tervo
 */
?>

<h4>Featured Products element start</h4>
<!--<ul>-->
<?php
// retrieve categories returned from method 'all()' in 'categories_controller.php'
$featured = $this->requestAction('featured/all');
foreach($featured as $key => $value):
?>
	<p><?php echo $html->link(__($value, true),
			array('controller' => 'products', 'action' => 'category', $key)
		);
		?>
	</p>
<?php
endforeach;

?>

<h4>Featured Products element end</h4>