<?PHP
Router::connect('/', array('controller' => 'pages', 'action' =>  'home'));
//Router::connect('/idiomas',array('controller' => 'pages', 'action' => 'home', 'idiomas' => true));
//Router::connect('/bilingue',array('controller' => 'pages', 'action' => 'home', 'bilingue' => true));
//Router::connect('/infantil',array('controller' => 'infantil', 'action' => 'home', 'infantil' => true));


CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';