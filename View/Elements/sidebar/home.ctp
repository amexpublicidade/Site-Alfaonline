<section class="sidebar grid_6 push_1">
    
    <div class="arearestrita">
        <span class="title">ÁREA EXCLUSIVA PARA <b>ALUNOS</b></span>
        <?PHP
            echo $this->Form->create('Aluno');
            echo $this->Form->input('login',array('label'=>array('text'=>'LOGIN','class'=>'grid_2'),'class'=>'grid_3'));
            echo $this->Form->input('senha',array('label'=>array('text'=>'SENHA','class'=>'grid_2'),'type'=>'password','class'=>'grid_3'));
            echo $this->Form->submit('OK',array('class'=>'grid_3 push_2'));
            echo $this->Form->end();
        ?>
    </div>
    
    <div class="acesso">
        <span class="title">ACESSO <b>RÁPIDO</b></span>
        <ul>
            <li><?PHP echo $this->Html->link('Matrícula On-Line','#'); ?></li>
            <li><?PHP echo $this->Html->link('Galeria de Fotos','#'); ?></li>
            <li><?PHP echo $this->Html->link('Galeria de Vídeos','#'); ?></li>
            <li><?PHP echo $this->Html->link('Eventos','#'); ?></li>
            <li><?PHP echo $this->Html->link('Multimídia','#'); ?></li>
            <li><?PHP echo $this->Html->link('Notícias','#'); ?></li>
        </ul>
    </div>
    
    <div class="menu">
        <?PHP echo $this->Html->link('ÁREA DOS ALUNOS','#',array('class'=>'button')); ?>
        <ul>
            <li><?PHP echo $this->Html->link('Meus Dados','#'); ?></li>
            <li><?PHP echo $this->Html->link('Minhas Notas','#'); ?></li>
            <li><?PHP echo $this->Html->link('Meus Horários','#'); ?></li>
            <li><?PHP echo $this->Html->link('Fale com o Professor','#'); ?></li>
            <li><?PHP echo $this->Html->link('Dúvidas Frequentes','#'); ?></li>
            <li><?PHP echo $this->Html->link('Calendário Escolar 2012','#'); ?></li>
            <li><?PHP echo $this->Html->link('Calendário de Provas','#'); ?></li>
            <li><?PHP echo $this->Html->link('Regimento Escolar','#'); ?></li>
        </ul>
    </div>
    
    <?PHP
        echo $this->Html->link('CONCURSO DE BOLSAS','#',array('class'=>'button'));
        echo $this->Html->link('ÁREA DO PROFESSOR','#',array('class'=>'button'));
    ?>
    
    <div class="menu">
        <?PHP echo $this->Html->link('O GRUPO ALFA','#',array('class'=>'button')); ?>
        <ul>
            <li><?PHP echo $this->Html->link('Conheça o Grupo','#'); ?></li>
            <li><?PHP echo $this->Html->link('Material Didático','#'); ?></li>
            <li><?PHP echo $this->Html->link('Estrutura Administrativa','#'); ?></li>
            <li><?PHP echo $this->Html->link('Conheça os Professores','#'); ?></li>
            <li><?PHP echo $this->Html->link('Acompanhe nossas Notas','#'); ?></li>
            <li><?PHP echo $this->Html->link('Faça sua Matrícula','#'); ?></li>
            <li><?PHP echo $this->Html->link('Nossos Eventos','#'); ?></li>
            <li><?PHP echo $this->Html->link('Nossas Localizações','#'); ?></li>
            <li><?PHP echo $this->Html->link('Fale Conosco','#'); ?></li>
        </ul>
    </div>
    
    <?PHP   
        $adsside=$this->Html->image('utfpr.jpg');
        echo $this->Html->link($adsside,'#',array('class'=>'adsside','escape'=>false));
    ?>
    
    
</section>