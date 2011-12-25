<?
/**
 * Handles all admin logic for Categories.
 * Extends Controller as any Controller and
 * is extended by the CategoryController to make
 * the admin logic accessible.
 * @property string layout
 * @property mixed request
 * @property mixed Category
 * @property mixed Session
 */


class CategoriesAdminController extends Controller{


    function beforeFilter(){
        parent::beforeFilter();
        $this->layout = 'admin';
    }

    public function admin_index(){

        $this->paginate = array('order' => 'Category.description ASC');
        $categories = $this->paginate('Category');
        $this->set(compact('categories'));

    }


    function admin_edit($id=null){
        $this->layout = 'admin';
        $this->Category->id = $id;

        # GET request
        if($this->request->is('get')){
            # fetch product from DB
            $this->request->data = $this->Category->read();
        }else if($this->request->is('post')){
            if($this->Category->save($this->request->data)){
                $this->Session->setFlash('Category was saved successfully');
                $this->redirect(array('action' => 'admin_edit', $id));
            }else{
                $this->Session->setFlash('Could not save Product');
            }
        }
    }
}