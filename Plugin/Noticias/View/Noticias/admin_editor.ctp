<?PHP
echo $this->Form->create('Noticia',array('type'=>'file','url'=>array('controller'=>'noticias','action'=>'add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>    
    <?PHP
    echo $this->Form->input('title',array('label'=>'Título'));
    echo $this->Form->input('content',array('class'=>'ckeditor','label'=>'Conteúdo'));
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>