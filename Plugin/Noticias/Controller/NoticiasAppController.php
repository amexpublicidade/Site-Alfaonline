<?PHP
class NoticiasAppController extends AppController{
    
    public $helpers=array('Painel.Admin');
    public $uses=array('Noticias.Noticia');
    
}