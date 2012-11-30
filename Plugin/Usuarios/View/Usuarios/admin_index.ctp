<fieldset class="box">
    <legend>Usuários</legend>
    
    <nav class="pannel">
        <?PHP
        echo $this->Html->link('Adicionar usuário',array('plugin'=>'usuarios','controller'=>'usuarios','action'=>'add','admin'=>true));
        ?>
    </nav>
    
    <table class="tables">
        <thead>
            <tr>
                <td class="id"><?=$this->Paginator->sort('Usuario.id','ID')?></td>
                <td><?=$this->Paginator->sort('Usuario.username','Usuário')?></td>
                <td><?=$this->Paginator->sort('Usuario.name','Nome')?></td>
                <td><?=$this->Paginator->sort('Usuario.email','Email')?></td>
                <td class="created"><?=$this->Paginator->sort('Usuario.created','Cadastro')?></td>
                <td class="edit">&nbsp;</td>
                <td class="delete">&nbsp;</td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($users as $user): $usuario=$user['Usuario']; ?>
            <tr>
                <td class="id"><?=$usuario['id']?></td>
                <td><?=$usuario['username']?></td>
                <td><?=$usuario['name']?></td>
                <td><?=$usuario['email']?></td>
                <td><?=$usuario['cdate']?></td>
                <td><?=$this->Html->link('Editar',array('action'=>'edit',$usuario['id']))?></td>
                <td><?=$this->Html->link('Excluir',array('action'=>'delete',$usuario['id']),false,'Tem certeza que deseja excluir este usuário?')?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
    </table>
    
</fieldset>