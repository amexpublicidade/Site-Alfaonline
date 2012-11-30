<?PHP
class SeoComponent extends Component{
    
    public $controller;
    public $model;
    public $kw;
    public $keywords;
    public $title;
    public $description;
    public $author;
    public $separator="-";
    public $components=array('Images.Image');
    
    public function initialize(Controller $controller) {
        parent::initialize($controller);
        $this->model=ClassRegistry::init('Seo.Config');
        $this->kw=ClassRegistry::init('Seo.Keywords');
        $this->controller=$controller;
        $keys=$this->kw->find('all');
        $k=array();
        foreach($keys as $key) $k[]=$key['Keywords']['keyword'];
        $this->controller->set('seo_keywords',implode(', ',$k));     
        
        $info=$this->model->read('*',1);
        $this->title=$info['Config']['title'];
        $this->description=$info['Config']['description'];
        $this->author=$info['Config']['author'];
        $this->controller->set('seo_title',$info['Config']['title']);
        $this->controller->set('seo_author',$info['Config']['author']);
        $this->controller->set('seo_description',$info['Config']['description']);
        
        //$here=$this->controller->here;
        $canonical=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strtolower(substr($canonical,0,3))!='www') $canonical='www.'.$canonical;
        $canonical='http://'.$canonical;
        $this->controller->set('seo_canonical',$canonical);        
        $this->controller->set('seo_analytics',"<script type=\"text/javascript\">var _gaq = _gaq || [];_gaq.push(['_setAccount', '".$info['Config']['analytics']."']); _gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>");
        $this->title();
        $this->description();
        $this->image();
        
    }
    
    public function setSeparator($separator=NULL){
        if(isset($separator) && strlen($separator)<2) $this->separator=$separator;
    }
    
    public function setTitle($title){
        $this->title=$title;
        $this->controller->set('title_for_layout',$this->title);
    }
    
    public function title($title=NULL){
        $title=isset($title)?"$title $this->separator $this->title":$this->title;
        $this->controller->set('title_for_layout',$title);
    }
    
    public function description($desc=NULL){
        $desc=isset($desc)?$desc:$this->description;
        $this->controller->set('seo_description',substr(strip_tags($desc),0,200).'...');
    }
    
    public function image($image=NULL){
        $image=isset($image)?Router::url($this->Image->url($image,array('method'=>'crop','width'=>200,'height'=>200)),true):Router::url("/img/og_image.jpg",true);
        $this->controller->set('seo_image',$image);
    }
    
    public function author($author=NULL){
        $author=isset($author)?$author:$this->author;
        $this->controller->set('seo_author',$author);
    }
    
    
    /*
     <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-33545105-5']); _gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
     */
    
}