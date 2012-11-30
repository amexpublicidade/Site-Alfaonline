<fieldset class="box">
    <legend>Notícias</legend>
    <table class="tables">
        <thead>
            <tr>
                <td><?=$this->Paginator->sort('title','Título da notícia')?></td>
                <td><?=$this->Paginator->sort('created','Criado em:')?></td>
                <td><?=$this->Paginator->sort('modified','Modificado em:')?></td>
                <td class="edit"></td>
                <td class="edit"></td>
            </tr>
        </thead>
        
        <tbody>
            <?PHP foreach($noticias as $noticia): ?>
            <tr>
                <td><?=$noticia['Noticia']['title']?></td>
                <td><?=$noticia['Noticia']['cdate']?></td>
                <td><?=$noticia['Noticia']['mdate']?></td>
                <td><?=$this->Admin->edit(array('action'=>'edit',$noticia['Noticia']['id']))?></td>
                <td><?=$this->Admin->delete(array('action'=>'delete',$noticia['Noticia']['id']))?></td>
            </tr>
            <?PHP endforeach; ?>
        </tbody>
    </table>
    
    <?=$this->element('Painel.paginator'); ?>
</fieldset>