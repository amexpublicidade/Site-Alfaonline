<?PHP
class SeoController extends SeoAppController{
    
    public function admin_index(){}
    
    public function admin_edit(){
        $this->layout="Adm.admin";
        if($this->data){
            $this->Config->id=1;
            if($this->Config->save($this->data)){
                $this->set('message','Os dados foram salvos com sucesso');
            }
        }
        $this->data=$this->Config->read('*',1);
        $this->set('keywords',$this->Keyword->find('all',array('order'=>'keyword ASC')));
    }
}