<?PHP
Configure::write('Adm.menu.Usuários',array(
    'Gerenciar usuários'=>array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'index','admin'=>true),
    'Adicionar usuário'=>array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'add','admin'=>true),
));