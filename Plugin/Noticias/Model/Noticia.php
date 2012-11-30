<?PHP
class Noticia extends NoticiasAppModel{
    
    public $virtualFields=array(
        'cdate'=>"DATE_FORMAT(Noticia.created,'%d/%m/%Y')",
        'mdate'=>"DATE_FORMAT(Noticia.modified,'%d/%m/%Y')",
    );
    
    public $actsAs=array(
        'Painel.Slug'=>array('title'=>'slug'),
    );
    
}