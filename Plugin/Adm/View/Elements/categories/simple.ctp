<fieldset class="box">
    <legend>Categorias</legend>
    <?PHP
    echo $this->Form->input('title');
    echo $this->Form->input('thumb',array('type'=>'file','class'=>'cfile'));
    ?>
</fieldset>