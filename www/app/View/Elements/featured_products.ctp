<?php
/**
 * @author Mathias
 * List featured products in a grid
 */

$featured_products = $this->requestAction('products/featured');
?>

<div id="featured">
    <h4>Featured products</h4>
    <ul class="featured-grid">
        <?php foreach($featured_products as $product):
            $price = $product['Product']['price'];
            if(!$price) $price = "Not available";
        ?>
            <li class="item">
                <h4 class="item-name">
                <?php
                    $name = $product['Product']['name'];
                    if(!$name){ $name = "No name"; }
                    echo $this->Html->link($name,
                        array('controller' => 'products',
                              'action' => 'view',
                               $product['Product']['id']));
                ?>
                </h4>

                <div class="item-thumbnail">
                    <img src="http://www.goodhousekeeping.com/cm/goodhousekeeping/images/KR/ghk-kenmore-42-stitch-sewing-machine-0311-smn-1.jpg" />
                </div>

                <div class="item-description">
                    <p><?php #echo $product['Manufacturer']['name'] ?></p>
                    <p><?php echo $product['Product']['description'] ?></p>
                </div>

                <div class="item-price">
                    $ <?php echo $price ?>
                </div>

                <div class="">
                    <?php
                        echo $this->Html->link(__('Read more'), array('controller' => 'products', 'action' => 'view', $product['Product']['id']));
                    ?>
                </div>

                <?php /* Price box */ ?>

                    <?php
                    /*
                    <div class="item-purchase">
                    <div class="item-price">$ <?php echo $price?> </div>

                    <?php echo $this->Form->create('Carts', array('type' => 'post', 'action' => '/add/'));?>
                        <?php
                            echo $this->Form->input('qty', array('class' => 'quantity-input', 'label' => 'Quantity', 'value' => 1));
                            echo $this->Form->hidden('product_id', array('value' => $product['Product']['id']));
                        ?>
                    <?php echo $this->Form->end(__('Buy'));?>
                    </div>
                    */
                    ?>

                <div style="clear: both"></div>
            </li>
        <?php endforeach; ?>
        <div class="clear"></div>
    </ul>

</div>