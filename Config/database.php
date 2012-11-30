<?PHP

class DATABASE_CONFIG {

    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'alfa',
        'prefix' => '',
        'encoding' => 'utf8',
    );
    public $host = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'user',
        'password' => 'password',
        'database' => 'test_database_name',
        'prefix' => '',
        'encoding' => 'utf8',
    );
    public $testing=array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'alfaon',
        'prefix' => '',
        'encoding' => 'utf8',
    );
    public function __construct() {
        $this->default=$this->testing;
    }
}
