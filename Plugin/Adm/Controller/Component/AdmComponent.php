<?PHP
class AdmComponent extends Component{
    
    private $controller;
    
    public function initialize(Controller $controller) {
        $this->controller=$controller;
    }
    
    public function add_menu(){
        $arguments=  func_get_args();
        $this->controller->set("adm_menu", $arguments);
    }
}