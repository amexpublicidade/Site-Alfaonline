<?PHP
App::uses('Controller', 'Controller');
class AppController extends Controller {
    
    public $helpers=array(
        //"Images.Image",
        //"Adm.Adm",
        "Painel.Date",
        //"Fancybox.Fancybox"
    );
    
    public $components=array('Painel.Locker');
    public $paginate=array();
    
    public function beforeFilter(){
        parent::beforeFilter();
    }
    
}
