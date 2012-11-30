<?PHP
class UsuariosController extends UsuariosAppController{
    
    public function login(){
        $this->layout="Usuarios.login";        
        if($this->data){
            if($this->Authenticate->login()){
                return $this->redirect($this->Authenticate->redirect());
            } else {
                $this->set('message','Usuário e/ou senha inválido(s)');
            }
        }
    }
    
    public function logout(){
        if($this->Authenticate->logout()) $this->redirect(array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'login','admin'=>false));
    }
    
    public function admin_index(){
        $this->layout="Adm.admin";
        $this->set('users',$this->paginate('Usuario'));
    }
    
    public function admin_add(){
        $this->layout="Adm.admin";
        $this->view="admin_editor";
        if($this->data && ($this->request->is('post') || $this->request->is('put'))){
            if($this->Usuario->save($this->data)) $this->redirect(array('action'=>'index'));
        }
    }
    
    public function admin_edit($id){
        $this->layout="Adm.admin";
        $this->view="admin_editor";
        $this->data=$this->Usuario->read('*',$id);
    }
    
    public function admin_delete($id){
        $this->autoRender=false;
        if($this->Usuario->delete($id)) $this->redirect(array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'index','admin'=>true));
    }
}