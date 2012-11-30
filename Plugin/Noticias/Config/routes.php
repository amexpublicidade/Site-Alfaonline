<?PHP
Router::connect('/noticias',array('plugin'=>'noticias','controller'=>'noticias','action'=>'index'));
Router::connect('/noticias/:slug',array('plugin'=>'noticias','controller'=>'noticias','action'=>'view'),array('slug'=>'[a-zA-Z0-9-_]+'));