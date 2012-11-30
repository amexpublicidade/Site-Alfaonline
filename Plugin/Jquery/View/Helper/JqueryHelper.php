<?PHP
class JqueryHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function call($inline=true){
        if($inline) return $this->Html->script('/jquery/jquery.js');
        else $this->Html->script('/jquery/jquery.js',array('inline'=>false));
    }
    
    public function plugin($plugin,$inline=true){
        if($inline) return $this->Html->script("/jquery/jquery.$plugin.js");
        else $this->Html->script("/jquery/jquery.$plugin.js",array('inline'=>false));
    }
}