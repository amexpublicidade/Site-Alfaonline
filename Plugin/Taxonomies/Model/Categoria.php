<?PHP
class Categoria extends TaxonomiesAppModel{
    
    public $validate=array(
        'categoria'=>array(
            'notEmpty'=>array('rule'=>'notEmpty','message'=>'Não deixe este campo em branco'),
            'isValid'=>array('rule'=>'/^[\w\d\s-_]+$/u','message'=>'Caracteres inválidos detectados (somente letras, números - e _'),
            'isUnique'=>array('rule'=>'isUnique','message'=>'Uma categoria com o mesmo nome já existe, escolha outro nome'),
        ),
    );
    
    public $actsAs=array(
        'Painel.Slug'=>array('categoria'=>'slug'),
    );
    
}