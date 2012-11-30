<?PHP
App::uses('AppController', 'Controller');
class PagesController extends AppController {


	public $uses = array();

        public function home(){        }
        
        public function idiomas_home(){
            $this->view="idiomas";
            
        }
        
}
