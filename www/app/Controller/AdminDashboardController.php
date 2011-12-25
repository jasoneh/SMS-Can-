<?

class AdminDashboardController extends Controller{

    function beforeFilter(){
        parent::beforeFilter();
    }
    /**
     * Main page for admin dashboard
     * @return void
     */
    public function admin_index(){

        $this->layout = 'admin';
        
    }
}