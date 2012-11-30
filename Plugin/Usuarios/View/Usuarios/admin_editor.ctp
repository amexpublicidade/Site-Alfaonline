<?PHP
echo $this->Form->create('Usuario',array('type'=>'file','url'=>array('action'=>'add')));
?>

<fieldset class="box">
    <legend>Informações pessoais</legend>    
    <?PHP
        echo $this->Form->input('Usuario.name',array('label'=>'Nome'));
        echo $this->Form->input('Usuario.email',array('label'=>'Email'));
        echo $this->Form->input('Usuario.twitter');
        echo $this->Form->input('Usuario.facebook');
    ?>
</fieldset>

<fieldset class="box">    
    <legend>Informações do usuário</legend>    
    <?PHP echo $this->Form->input('Usuario.username',array('label'=>'Usuário')); ?>
    
    <?PHP if(isset($this->data['Usuario']['id']) && !empty($this->data['Usuario']['id'])): ?>
    <p>Para trocar sua senha, digite sua nova senha abaixo e depois redigite</p>
    <?PHP endif; ?>
    
    <?PHP
    echo $this->Form->input('Usuario.password',array('label'=>'Senha','type'=>'password','value'=>''));
    echo $this->Form->input('Usuario.rpassword',array('label'=>'Redigite sua senha','type'=>'password','value'=>''));
    ?>
    
</fieldset>

<?PHP
echo $this->element('Images.destaque',array('label'=>'Foto','name'=>'foto'));
echo $this->Form->hidden('id');
echo $this->Form->end('Enviar');
?>