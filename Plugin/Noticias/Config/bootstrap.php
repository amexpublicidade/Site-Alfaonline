<?PHP
Configure::write('Painel.menu.Notícias',array(
    'Gerenciar notícias'=>array('plugin'=>'noticias','controller'=>'noticias','action'=>'admin_index'),
    'Adicionar notícia'=>array('plugin'=>'noticias','controller'=>'noticias','action'=>'admin_add'),
));