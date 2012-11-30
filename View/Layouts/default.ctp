<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?PHP echo $title_for_layout; ?></title>
<?PHP
    //css
    echo $this->Html->css('960');
    echo $this->Html->css('reset');
    echo $this->Html->css('/fonts/aller/stylesheet');
    echo $this->Html->css('styles.less','stylesheet/less');
    echo $this->fetch('css');
    //js
    echo $this->Html->script('less');
    echo $this->Html->script('modernizr');
    echo $this->Html->script('jquery');
    echo $this->Html->script('functions');
    echo $this->Html->script('//platform.twitter.com/widgets.js');
    echo $this->Html->script('//apis.google.com/js/plusone.js');
    echo $this->Html->script('//assets.pinterest.com/js/pinit.js');
    echo $this->Html->script('/painel/js/copypaste.js');
    echo $this->fetch('script');
?>
</head>
<body<?PHP if(isset($this->params->prefix)){ ?> class="<?=$this->params->prefix?>"<?PHP } ?>>

    <?PHP echo $this->element('topo'); ?>
    
    <section id="container" class="container_24">
        <?PHP 
            echo $this->element('header');
            echo $this->fetch('content'); 
        ?>    
        <section class="share">
            <section class="content">
                <span class="title">COMPARTILHE</span>
                
                <div class="sharebutton">
                    <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Famex.dynsite.net%2Falfa&amp;send=false&amp;layout=box_count&amp;width=61&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:61px; height:90px;" allowTransparency="true"></iframe>                
                </div>
                
                <div class="sharebutton">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$this->here?>" data-via="<?=$title_for_layout?>" data-lang="en" data-count="vertical">Tweet</a>
                </div>
                
                <div class="sharebutton">
                    <div class="g-plusone" data-size="tall" data-href="<?= $this->here; ?>"></div>
                </div>
                
                <div class="sharebutton">
                    <a href="http://pinterest.com/pin/create/button/?url=<?=urlencode($this->here)?>&media=http%3A%2F%2Famex.dynsite.net%2Falfa&description=testeeeeeeeeeee" class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
                </div>
                
                <a href="#" class="email">E-MAIL</a>
                
            </section>
        </section>
    </section>
    
    <?PHP echo $this->element('footer'); ?>
    

    
</body>
</html>
