<?PHP
class FancyboxHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function call(){
        $this->Html->css('/fancybox/jquery.fancybox',false,array('inline'=>false));
        $this->Html->script('/fancybox/jquery.fancybox',array('inline'=>false));
    }
    
    public function media(){
        $this->Html->script('/fancybox/helpers/jquery.fancybox-media',array('inline'=>false));
    }
    
    public function inline($media=false){
        $fancy=$this->Html->css('/fancybox/jquery.fancybox');
        $fancy.=$this->Html->script('/fancybox/jquery.fancybox');
        if($media){
            $fancy.=$this->Html->script('/fancybox/helpers/jquery.fancybox-media');
        }
        return $fancy;
    }   
}