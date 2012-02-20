<?php

class Compatibility extends AppModel{

    public $name = 'Compatibility';
    public $displayField = 'product_id';
    public $useTable = 'compatibilities';

    public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'product_id'
        ),
    );
}
