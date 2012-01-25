<?php
/**
 * For contact form on static contact us page
 * @author: mathias
 * @date: 12/25/11
 */


class Contact extends AppModel{

    public $useTable = false;


    public $schema = array(
        'name' => array('type' => 'string', 'length' => 100),
        'email' => array('type' => 'string', 'length' => 255),
        'message' => array('type' => 'text')
    );

    public $validate = array(
        'name' => array(
            'rule' => array('minLength' => 2),
            'message' => 'A name is required',
        ),

        'email' => array(
            'rule' => 'email',
            'message' => 'A valid email is required',
        ),

        'message' => array(
            'rule' => array('minLength' => 1),
            'message' => 'A message is required',
        ),
    );

}