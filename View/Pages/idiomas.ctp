<?PHP
    $this->Html->css('idiomas.less','stylesheet/less',array('inline'=>false));
    $this->Html->script("cycle",array('inline'=>false));
?>
<script type="text/javascript">
    jQuery(function($){
        $(".cycle").cycle({
                speed:'slow',
                timeout: 4000,
                pagerAnchorBuilder: pagerFactory,
                pager: '#nav'
        });
        
        $(".news").cycle({
                fx: 'scrollVert',
                speed:'slow',
                timeout: 4000,
                pagerAnchorBuilder: pagerFactory,
                pager: '#navigate',
                next: '.nav_noticias>.next',
                prev: '.nav_noticias>.prev'
        });
		

	function pagerFactory(idx, slide) {
		var s = idx > 2 ? ' style="display:none"' : '';
		if(idx < 10){
			return '<li><a href="#">0'+(idx+1)+'</a></li>';
		}else{
			return '<li><a href="#">'+(idx+1)+'</a></li>';
		}
	};	
	        
    });
</script>
<section id="banner" class="grid_24">
    <div class="cycle grid_24 alpha omega">
        <?=$this->Html->image('bannertest.jpg');?>
        <?=$this->Html->image('bannertest.jpg');?>
        <?=$this->Html->image('bannertest.jpg');?>
    </div>
    <ul id="nav"></ul>
</section>

<div class="grid_17">
    
    <section class="noticias grid_17 alpha omega">
        <span class="titulo">
            <b>NOTÍCIAS</b> DO SEU INTERESSE
            <?=$this->Html->link('Veja + Notícias','#');?>
        </span>
        
        <div class="principais">
            <div class="nav_noticias">
                <span class="next"></span>
                <span class="prev"></span>
                <ul id="navigate"></ul>
            </div>
            <div class="principal news">
                <a href="#">
                    <?=$this->Html->image('noticiatest.jpg');?>
                    <span class="content">
                        <span class="title">Alunos protestam contra peso da redação do Enem na seleção da UFPE</span>
                        Estudantes de cursinhos e do 3º ano participam da manifestação, no Derby. 'Ninguém confia na correção do Enem', diz a estudante Leila Santiago.
                    </span>
                </a>
                <a href="#">
                    <?=$this->Html->image('noticiatest.jpg');?>
                    <span class="content">
                        <span class="title">Alunos protestam contra peso da redação do Enem na seleção da UFPE</span>
                        Estudantes de cursinhos e do 3º ano participam da manifestação, no Derby. 'Ninguém confia na correção do Enem', diz a estudante Leila Santiago.
                    </span>
                </a>
            </div>
        </div>
        
        <?PHP $t=1; for($i=1;$i<=6;$i++){ 
            if($t==1){ $class="alpha"; }else{ $class="push_1"; }
        ?>
        <a href="#" class="noticia grid_8 <?=$class?>">
            <?PHP echo $this->Html->image('noticiateste.jpg',array('class'=>'grid_3 alpha')); ?>
            <span class="title grid_3">Fatecs divulgam índice de candidato/vaga do Vestibular 2012</span>
            <span class="time">20/09/2012</span>
        </a>
        <?PHP
                if($t==2){ $t=1; }else{ $t++; }
              }
        ?>

        
    </section>
    
    <?PHP echo $this->Html->image('ads.jpg',array('class'=>'adsmiddle grid_17 alpha omega')); ?>
    
    <div class="element grid_5 alpha">
        <span class="title">GALERIA DE <b>FOTOS</b> <span class="st">»</span></span>
        <a class="first">
            <span class="image">
                <?PHP echo $this->Html->image('gallerytest.jpg'); ?>
            </span>
            <span class="time">20/12/2011</span>
            <span class="title">Festa do Pijama</span>
        </a>
        <ul>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
        </ul>
    </div>
    
    <div class="element grid_5 push_1">
        <span class="title">GALERIA DE <b>VÍDEOS</b> <span class="st">»</span></span>
        <a class="first">
            <span class="image">
                <?PHP echo $this->Html->image('gallerytest.jpg'); ?>
                <span class="play"></span>
            </span>
            <span class="time">20/12/2011</span>
            <span class="title">Festa do Pijama</span>
        </a>
        <ul>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
        </ul>
    </div>    
    
    <div class="element grid_5 push_2">
        <span class="title">ENTRETENIMENTO <span class="st">»</span></span>
        <a class="first">
            <span class="image">
                <?PHP echo $this->Html->image('gallerytest.jpg'); ?>
            </span>
            <span class="time">20/12/2011</span>
            <span class="title">Festa do Pijama</span>
        </a>
        <ul>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
            <li><a href="#"><span class="time">22/06/12 -</span> Mothers Day</a></li>
        </ul>
    </div>    

</div> 

<?PHP echo $this->element('sidebar/prefixes'); ?>

<div class="mestre grid_24">
    <span class="title"><b>DICA</b> DO MESTRE</span>
    
    <a href="#" class="grid_4 professor bilingue alpha">
        <?PHP echo $this->Html->image('professortest.jpg'); ?>
        <span class="name">Professor Legalzão</span>
        Dicas de postura: confira aqui algumas dicas para carregar a mochila escolar de maneira mais correta e evitar possíveis problemas de coluna e postura.        
    </a>
    
    <a href="#" class="grid_4 professor infantil push_1">
        <?PHP echo $this->Html->image('professortest.jpg'); ?>
        <span class="name">Professor Legalzão</span>
        Dicas de postura: confira aqui algumas dicas para carregar a mochila escolar de maneira mais correta e evitar possíveis problemas de coluna e postura.        
    </a>
    
    <a href="#" class="grid_4 professor fd1 push_2">
        <?PHP echo $this->Html->image('professortest.jpg'); ?>
        <span class="name">Professor Legalzão</span>
        Dicas de postura: confira aqui algumas dicas para carregar a mochila escolar de maneira mais correta e evitar possíveis problemas de coluna e postura.        
    </a>
    
    <a href="#" class="grid_4 professor vestibular push_3">
        <?PHP echo $this->Html->image('professortest.jpg'); ?>
        <span class="name">Professor Legalzão</span>
        Dicas de postura: confira aqui algumas dicas para carregar a mochila escolar de maneira mais correta e evitar possíveis problemas de coluna e postura.        
    </a>
    
    <a href="#" class="grid_4 professor bilingue push_4">
        <?PHP echo $this->Html->image('professortest.jpg'); ?>
        <span class="name">Professor Legalzão</span>
        Dicas de postura: confira aqui algumas dicas para carregar a mochila escolar de maneira mais correta e evitar possíveis problemas de coluna e postura.        
    </a>
    
</div>