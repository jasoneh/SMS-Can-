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
        <?php foreach($featured_products as $product): ?>
            <li class="item">
                <?php #print_r($product); ?>
                <h4><?php echo $this->Html->link($product['Product']['name'],
                                              array('controller' => 'products',
                                                    'action' => 'view',
                                                    $product['Product']['id'])); ?>
                </h4>
                <p><?php echo $product['Product']['description'] ?></p>
                <?php /* Price box */ ?>
                <div class="item-purchase">
                    <?
                        $price = $product['Product']['price'];
                        if(!$price) $price = "Not available" ?>
                    <p class="item-price">$ <?php echo $price?> </p>

                    <?php echo $this->Form->create('Carts', array('type' => 'post', 'action' => '/add/'));?>

                        <?php
                            echo $this->Form->input('qty', array('class' => 'quantity-input', 'label' => 'Quantity', 'value' => 1));
                            echo $this->Form->hidden('product_id', array('value' => $product['Product']['id']));
                        ?>

                    <?php echo $this->Form->end(__('Buy'));?>

                    <!--<a href="" class="awesome green">Add to cart</a>-->
                    <?php /*echo $this->Html->link(
                            'Add to cart',
                            array('controller' => 'cart', 'action' => 'add', $value['Product']['id']),
                            array('class' => 'awesome green')
                        )
                    */?>
                </div>
                <div style="clear: both"></div>
            </li>
        <?php endforeach; ?>
        <div class="clear"></div>
    </ul>

</div>