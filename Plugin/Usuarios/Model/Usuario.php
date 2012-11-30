<?PHP
class Usuario extends UsuariosAppModel{
    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(Usuario.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(Usuario.modified,'%d/%m/%Y')",
    );
    
    public $validate=array(
        'name'=>array('rule'=>'notEmpty','message'=>'Não deixe este campo em branco'),
        'email'=>array('rule'=>'notEmpty','message'=>'Não deixe este campo em branco'),
        'username'=>array(
            'minLength'=>array(
                'rule'=>array('minLength',5),
                'message'=>'Mínimo de cinco caracteres',
            ),
            'valid'=>array(
                'rule'=>'/^[a-zA_Z0-9]+$/i',
                'message'=>'Caracteres inválidos detectados',
            ),
            'isUnique'=>array(
                'rule'=>'isUnique',
                'message'=>'Este usuário já está registrado, cadastre outro'
            ),
        ),
        'password'=>array(
            'minLength'=>array(
                'rule'=>array('minLength',5),
                'message'=>'Mínimo de cinco caracteres',
            ),
            'isValid'=>array(
                'rule'=>'/^[a-zA_Z0-9#@!]+$/i',
                'message'=>'Caracteres inválidos'
            ),
        ),
    );
    
    public $UploadFields=array('foto'=>'img/usuarios/fotos',);
    
    public $actsAs=array('Images.Upload');
    
    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);        
        if(!empty($this->data[$this->name]['id'])){
            if(empty($this->data[$this->name]['password']) && empty($this->data[$this->name]['rpassword'])){
                unset($this->data[$this->name]['password']);
                unset($this->data[$this->name]['rpassword']);
            }
        }        
        if(isset($this->data[$this->name]['password'])){
            if($this->data[$this->name]['password']!=$this->data[$this->name]['rpassword']) $this->invalidate ('password','Senha e repetição não conferem');
        }
        return true;
    }
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if(isset($this->data[$this->name]['password'])){
            $this->data[$this->name]['password'] =  AuthenticateComponent::password($this->data[$this->name]['password']);
        }
        return true;
    }
}