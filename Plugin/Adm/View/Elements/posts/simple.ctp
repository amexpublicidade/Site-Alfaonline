<fieldset class="box">
    <legend>Conteúdo</legend>
    
    <?PHP
    echo $this->Form->input('title',array('label'=>__("Título")));
    echo $this->Form->input('content',array('label'=>__("Conteúdo"),'class'=>'ckeditor'));
    echo $this->Form->input('thumb',array('label'=>__('Miniatura'),'class'=>'cfile','type'=>'file'));
    ?>
</fieldset>