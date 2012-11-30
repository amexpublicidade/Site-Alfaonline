<?PHP
class UsuariosAppController extends AppController{
    
    public $uses=array('Usuarios.Usuario');
    public $paginate=array('limit'=>10);
    
}