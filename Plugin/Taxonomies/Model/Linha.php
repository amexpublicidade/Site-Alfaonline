<?PHP
class Linha extends TaxonomiesAppModel{
    
    public $validate=array(
        'linha'=>array(
            'notEmpty'=>array('rule'=>'notEmpty','message'=>'Não deixe a linha em branco'),
            'isValid'=>array('rule'=>'/^[\w\d\s-_]+$/u','message'=>'Caracteres inválidos (somente letras, números - ou _)'),
            'isUnique'=>array('rule'=>'isUnique','message'=>'Uma linha com o mesmo nome já está cadastrada'),
        ),
    );
    
    public $actsAs=array(
        'Painel.Slug'=>array('linha'=>'slug'),
    );    
}