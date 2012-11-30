<?PHP
class LinhasController extends TaxonomiesAppController{
    
    public $uses=array('Taxonomies.Linha');
    public $paginate=array('limit'=>10,'order'=>'Linha.id DESC');
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $terms=$this->paginate('Linha');
        $this->set(compact('terms'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar linha');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Linha->save($this->data)) $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editando linha');
        $this->data=$this->Linha->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Linha->delete($id)) $this->redirect(array('action'=>'index'));
    }
    
}