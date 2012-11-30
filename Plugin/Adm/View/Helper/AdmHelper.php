<?PHP
class AdmHelper extends AppHelper{
    
    public $helpers=array('Form');
    public $uid;
    public $view;
    
    public function __construct(View $view, $settings = array()){
        
        parent::__construct($view, $settings);
        
        if(!isset($view->data) || empty($view->data)){
            $this->uid=  uniqid();
            $view->set('uid',$this->uid);
            return false;
        }
        
        $get_data=$this->data;
        $get_data=array_shift($get_data);
        $this->uid=!empty($get_data['uid'])?$get_data['uid']:uniqid();
        $view->set('uid',$this->uid);
    }
    
    public function uid(){
        return $this->Form->hidden('uid',array('value'=>$this->uid));
    }
    
}