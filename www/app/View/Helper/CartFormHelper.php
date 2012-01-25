<?php
/**
 * Creates a purchase form for a given product
 */


App::uses('AppHelper', 'View/Helper');
class CartformHelper extends AppHelper{

    public $helpers = array('Html', 'Form');

    /**
     * Create a add-to-cart form from a product
     * @param $product
     * @return void
     */
    function makeCartForm($product){

        echo '<div class="item-purchase">';

        echo '<h4>Add to cart</h4>';
        $price = $product['Product']['price'];
        if(!is_numeric($price) && empty($price)){
            $price = "Not available";
        }
        echo "<p>Price: $price</p>";
        echo $this->Form->create('Carts', array('type' => 'post', 'action' => '/add/'));

        echo $this->Form->input('qty', array('class' => 'quantity-input', 'label' => 'Quantity', 'value' => 1));
        echo $this->Form->hidden('product_id', array('value' => $product['Product']['id']));

        echo $this->Form->end(__('Buy'));

        echo "</div>";
    }
}
