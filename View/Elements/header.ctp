<header class="grid_24">
   
    <?PHP echo $this->Html->link('ALFA','#',array('class'=>'logo grid_5')); ?>
    <span class="grid_7 date"><?PHP echo $this->Date->saudation(); ?></span>
    
    <div class="form grid_9">
        <?PHP
            echo $this->Form->create('Search');
            echo $this->Form->input('s',array('class'=>'grid_7','placeholder'=>'o que você procura?','label'=>false));
            echo $this->Form->end('OK',array('class'=>'push_1'));
        ?>
    </div>
    <nav class="grid_18 suffix_1">
        <ul>
            <li class="idiomas"><?=$this->Html->link('IDIOMAS','/idiomas');?></li>
            <li class="bilingue"><?=$this->Html->link('BILINGUE','#');?></li>
            <li class="infantil"><?=$this->Html->link('INFANTIL','#');?></li>
            <li class="fd1"><?=$this->Html->link('FUNDAMENTAL 1','#');?></li>
            <li class="fd2"><?=$this->Html->link('FUNDAMENTAL 2','#');?></li>
            <li class="medio"><?=$this->Html->link('ENSINO MÉDIO','#');?></li>
            <li class="vestibular"><?=$this->Html->link('VESTIBULAR','#');?></li>
            <li class="high"><?=$this->Html->link('HIGH-SCHOOL','#');?></li>
        </ul>
    </nav>
    <a href="#" class="atendimento grid_4">
        <span class="balloons"></span>
        ATENDIMENTO ON-LINE
    </a>
</header>