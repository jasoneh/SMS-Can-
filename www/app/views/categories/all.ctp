<p>listing all the categories</p>
<?
echo "<pre>";
        print_r($categories);
        echo "</pre>";
?>
<ul>
<? foreach($categories as $key => $value):?>

    <li><?php echo $html->link(__($value, true), array('controller' => 'products', 'action' => 'category', $key));?></li>
<?php endforeach; ?>
</ul>