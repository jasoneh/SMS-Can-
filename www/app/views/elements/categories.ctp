<?php
/**
 * Render a list of product categories
 * @author Mathias Tervo
 */
?>

<ul>
<?php 
$categories = $this->requestAction('categories/index');
foreach($categories as $category):
?>
	<li><?php echo $html->link(__($category['Category']['name'], true), 
			array('controller' => 'products', 'action' => 'category', $category['Category']['id'])
		); 
		?>
	</li>
<?php 	
endforeach;
?>
</ul>
