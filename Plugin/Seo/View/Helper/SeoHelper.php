<?PHP
class SeoHelper extends AppHelper{
    
    public $helpers=array('Html');
    
    public function call(){
        
    }
    
    public function keywords(){
        return $this->Html->meta('keywords',$seo_keyword);
    }
    
    public function author(){
    }
    
    public function description(){
    }
    
    public function analytics(){
    }
    
}