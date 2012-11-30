<?PHP
CakePlugin::load('Painel',array('routes'=>true,'bootstrap'=>true));
CakePlugin::load('Taxonomies',array('bootstrap'=>true));
CakePlugin::load('Noticias',array('routes'=>true,'bootstrap'=>true));


//CakePlugin::load('Adm');
//CakePlugin::load('Images');
//CakePlugin::load('Jquery');
//CakePlugin::load('Fancybox');
//CakePlugin::load('Seo',array('bootstrap'=>true));
//CakePlugin::load('Usuarios',array('bootstrap'=>true,'routes'=>true));


//NOT EDIT
Cache::config('default', array('engine' => 'File'));
Configure::write('Dispatcher.filters', array('AssetDispatcher','CacheDispatcher'));
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array('engine' => 'FileLog','types' => array('notice', 'info', 'debug'),'file' => 'debug',));
CakeLog::config('error', array('engine' => 'FileLog','types' => array('warning', 'error', 'critical', 'alert', 'emergency'),'file' => 'error',));
