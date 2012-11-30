<?PHP
class PainelAppController extends AppController{
    
    public $helpers=array('Html','Form','Session','Painel.Admin');
    public $uses=array('Painel.Group','Painel.Lock','Painel.Prefix','Painel.Sector','Painel.User');
    public $paginate=array('limit'=>20);
    
    public function beforeFilter() {
        parent::beforeFilter();
        $groups=$this->Group->find('list',array('fields'=>array('id','name')));
        $this->set('groups',$groups); 
   }
    
}