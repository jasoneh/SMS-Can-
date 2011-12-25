<?
/**
 * Handles all admin logic for Categories.
 * Extends Controller as any Controller and
 * is extended by the CategoryController to make
 * the admin logic accessible.
 * @property string layout
 */


class CategoriesAdminController extends Controller{

    public $uses = array('Category');
    
    function beforeFilter(){
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function admin_index(){

        $this->paginate = array('order' => 'Category.description ASC');
        $categories = $this->paginate('Category');
        $this->set(compact('categories'));

    }
}