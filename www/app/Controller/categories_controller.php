<?php
/**
 * 
 */
require_once('categories_admin_controller.php');

class CategoriesController extends CategoriesAdminController{

    var $name = 'Categories';
    var $helpers = array('Html', 'Session', );
    var $uses = array('Product', 'Category', 'Manufacturer');
    var $scaffold;


    /**
     * @return list of all categories
     */
    function all(){
        return $this->Category->find('list', array('fields' => 'Category.description', 'Category.id'));
    }

}