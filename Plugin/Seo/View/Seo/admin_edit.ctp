<?PHP
echo $this->Form->create('Config');
$this->Html->css('/seo/css/seo.css',false,array('inline'=>false));
?>

    <?PHP if(isset($message)): ?><h1 class="message"><?=$message?></h1><?PHP endif; ?>

<fieldset class="box">
    <legend>Configurações SEO</legend>
    <?PHP
    echo $this->Form->input('title',array('label'=>'Título do site'));
    echo $this->Form->input('author',array('label'=>'Autor'));
    echo $this->Form->input('description',array('label'=>'Descrição'));
    echo $this->Form->input('analytics',array('label'=>'Analytics (apenas o id)'))
    ?>
</fieldset>

<fieldset class="box">
    <legend>Keywords (Máximo de 10 keywords)</legend>
    <nav class="pannel">
        <a href="#" id="keyword-add">Add</a>
    </nav>
    
    <div class="keywords" id="keywords">
        <?PHP foreach($keywords as $keyword): ?>
        <div>
            <span class="keyword"><?=$keyword['Keyword']['keyword']?></span>
            <a href="#" class="keyword-delete" data-id="<?=$keyword['Keyword']['id']?>"><img src="<?=$this->base?>/seo/img/icon_delete.png" alt=""></a>
        </div>
        <?PHP endforeach; ?>
        
    </div>
    <br class="clearfix" />
</fieldset>
<?PHP echo $this->Form->end('Salvar'); ?>

<script type="text/javascript">
jQuery(function($){
    var base='<?=$this->base?>';
    $("#keyword-add").click(function(){
        
        var count=$("#keywords>div").length;
        if(count>=10){
            alert('Número máximo de keywords atingido');
            return false;
        }
        
        if(kw=prompt('Qual keyword deseja adicionar?')){
            $.getJSON(base+'/json/seo/keywords/add/'+kw, null, function(data){
                if(data.success){
                    var keyword=$('<div data-keyword="'+kw+'" />');
                    keyword.append('<span class="keyword">'+kw+'</span>');
                    keyword.append('<a href="#" data-id="'+data.id+'" class="keyword-delete"><img src="'+base+'/seo/img/icon_delete.png" alt="" /></a>');
                    $('#keywords').append(keyword);
                }
            });
            return false;
        }
        return false; 
    });
    
    $(".keyword-delete").live('click',function(){
        var id=$(this).attr('data-id');
        var $this=$(this);
        $.getJSON(base+'/json/seo/keywords/delete/'+id, null, function(data){
            if(data.success) $this.parent().detach();
        });
        return false;
    });
})
</script>