<?PHP
App::uses('AuthComponent', 'Controller/Component');
class AuthenticateComponent extends AuthComponent{
    public $userModel="Usuarios.Usuario";
    public $loginAction="/admin";
    public $loginRedirect=array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'index','admin'=>true);
    public $authenticate=array('Form'=>array('userModel'=>'Usuarios.Usuario'));
}