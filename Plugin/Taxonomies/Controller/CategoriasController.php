<?PHP
class CategoriasController extends TaxonomiesAppController{
    
    public $uses=array('Taxonomies.Categoria');
    public $paginate=array('limit'=>10,'order'=>'Categoria.id DESC');
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $terms=$this->paginate('Categoria');
        $this->set(compact('terms'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar categoria');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Categoria->save($this->data)) $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editando categoria');
        $this->data=$this->Categoria->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Categoria->delete($id)){
            $this->redirect(array('action'=>'index'));
        }
    }
    
}