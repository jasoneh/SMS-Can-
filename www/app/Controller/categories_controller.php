<?php

class CategoriesController extends AppController{

    var $name = 'Categories';
    var $helpers = array('Html', 'Session', );
    var $uses = array('Product', 'Category', 'Manufacturer');
    var $scaffold;


    /**
     * @return list of all categories
     */
    function all(){
        return $this->Category->find('list');
    }

}