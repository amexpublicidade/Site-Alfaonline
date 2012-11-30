<fieldset class="box">
    <legend>Categorias</legend>
    <table class="tables">
        <thead>
            <tr>
                <td><?=$this->Paginator->sort('categoria')?></td>
                <td class="edit">&nbsp;</td>
                <td class="edit">&nbsp;</td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($terms as $term): $term=array_shift($term); ?>
            <tr>
                <td><?=$term['categoria']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$term['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$term['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
    </table>
    <?=$this->element('Painel.paginator')?>
</fieldset>