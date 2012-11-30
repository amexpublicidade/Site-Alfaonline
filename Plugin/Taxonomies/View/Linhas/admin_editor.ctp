<?PHP
echo $this->Form->create('Linha',array('url'=>array('controller'=>'linhas','action'=>'admin_add')));
?>

<fieldset class="box">
    <legend><?=$title?></legend>
    <?PHP
    echo $this->Form->input('linha');
    ?>
</fieldset>

<?PHP
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>