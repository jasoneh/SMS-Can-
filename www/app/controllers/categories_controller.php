<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	#var $scaffold;
    var $components = array('Auth');

    // Allow following actions to non logged in users
    function beforeFilter() {
        $this->Auth->allow('*');
    }

    var $paginate = array(
		'field' => array('Category.id', 'Category.name'),
		'limit' => 50,
		'order' => array(
			'Category.name' => 'asc'
		)
	);
    function all(){
        $categories = $this->Category->find('list', array(
            'fields' => array('Category.id', 'Category.description')
        ));
		$this->set('categories', $categories);
    }
}
?>