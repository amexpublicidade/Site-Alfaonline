<?PHP
echo $this->Form->create('Categoria',array('url'=>array('controller'=>'categorias','action'=>'admin_add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
    echo $this->Form->input('categoria');
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>