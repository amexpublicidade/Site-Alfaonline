<?PHP
class NoticiasController extends NoticiasAppController{
    
    public $paginate=array('limit'=>10,'order'=>'Noticia.id DESC');
    
    public function admin_index(){
        $this->layout="Painel.admin";
        $noticias=$this->paginate('Noticia');
        $this->set(compact('noticias'));
    }
    
    public function admin_add(){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Adicionar nova notícia');
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Noticia->save($this->data)){
                $this->redirect(array('action'=>'index'));
            }
        }
    }
    
    public function admin_edit($id){
        $this->layout="Painel.admin";
        $this->view="admin_editor";
        $this->set('title','Editando notícia');
        $this->data=$this->Noticia->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Noticia->delete($id)) $this->redirect(array('action'=>'index'));
    }
}