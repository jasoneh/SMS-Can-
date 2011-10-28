<?php
/**
 * @author: Mathias Tervo
 * @date: 10/15/11
 *
 * Featured products on the first page
 */

class Featured extends AppModel{

    var $hasMany = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
}

