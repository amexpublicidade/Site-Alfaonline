<?PHP
Configure::write('Painel.menu.Taxonomias',array(
    'Gerenciar linhas'=>array('plugin'=>'taxonomies','controller'=>'linhas','action'=>'admin_index'),
    'Adicionar linha'=>array('plugin'=>'taxonomies','controller'=>'linhas','action'=>'admin_add'),
    'separator',
    'Gerenciar categorias'=>array('plugin'=>'taxonomies','controller'=>'categorias','action'=>'admin_index'),
    'Adicionar categoria'=>array('plugin'=>'taxonomies','controller'=>'categorias','action'=>'admin_add'),
));