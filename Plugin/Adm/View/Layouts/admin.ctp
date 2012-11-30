<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title><?PHP echo $title_for_layout; ?></title>
        <script type="text/javascript">var base='<?PHP echo $this->base; ?>';</script>
        <?PHP
        echo $this->fetch('meta');
        echo $this->Html->css('/Adm/css/reset.css');
        echo $this->Html->css('/Adm/css/layout.css');
        echo $this->Html->css("/Adm/css/forms.css");
        echo $this->Html->css("/Adm/css/enhanced.css");
        echo $this->Html->css("/Adm/fancybox/jquery.fancybox");
        echo $this->fetch('css');
        echo $this->Html->script('/Adm/js/jquery.js');
        echo $this->Html->script('/Adm/js/jquery.fileinput.js');
        echo $this->Html->script('/Adm/fancybox/jquery.fancybox.js');
        echo $this->Html->script('/Adm/ckeditor/ckeditor');
        echo $this->fetch('script');
        ?>
    </head>

    <body class="<?=$this->params->controller?>">

        <section id="leftcontent">

            <div id="logo">
                <?PHP
                $image = Configure::read('Adm.logo');
                if (empty($image))
                    $image = "/adm/img/logo.png";
                echo $this->Html->image($image);
                ?>
            </div>

            <div id="adminbar">
                <p>Logado como <span><?= AuthComponent::user('username') ?></span></p>
                <nav>
                    <?PHP
                    echo $this->Html->link("Visitar o site", '/', array('target' => '_blank'));
                    echo $this->Html->link("Logout", array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false, 'plugin' => 'usuarios',));
                    ?>
                </nav>
            </div>

            <nav id="menu">
                <ul>
                    <?PHP
                    $menus = Configure::read('Adm.menu');
                    foreach ($menus as $key => $menu):
                        $temp=$menu;
                        $temp=array_shift($temp);
                        $controller=$temp['controller'];
                        $addclass=$this->params->controller==$controller?'open':'close';
                        if(isset($this->params->plugin)){
                            if($this->params->plugin==$temp['plugin']) $addclass='open';
                        }
                        ?>
                        <li class="<?=$controller?> <?=$addclass?>"><?PHP echo $this->Html->link($key, '#'); ?>
                            <ul>
                                <?PHP foreach ($menu as $k => $v): ?>
                                    <?PHP if ($k == "separator" || $v == "separator"): ?><li class="separator"></li><?PHP else: ?>
                                        <li><?PHP echo $this->Html->link($k, $v); ?></li><?PHP endif; ?>
                                <?PHP endforeach; ?>
                            </ul>
                        </li>
                    <?PHP endforeach; ?>
                </ul>
            </nav>

            <br class="clearfix" />
        </section>

        <section id="content"><?PHP echo $this->fetch('content'); ?><br class="clearfix" /></section>
        <script type="text/javascript">
            jQuery(function($){
                $("nav#menu>ul>li>a").click(function(e){
                    $("nav#menu>ul>li>ul").slideUp();
                    //$(this).parent().find('ul').slideToggle();
                    if($(this).parent().find('ul').css('display')=='block'){
                        $(this).parent().find('ul').stop().slideUp();
                    } else {
                        $(this).parent().find('ul').stop().slideDown();
                    }
                    e.stopPropagation();
                    return false;
                });                
                $('.cfile').customFileInput();
            })
        </script>

        <script type="text/javascript">
            jQuery(function($){
                $("fieldset.languaged").css('display','none');
                $("fieldset[data-language=ptb]").css('display','block');
                $(".languages>a").click(function(){
                    var lang=$(this).attr('href').split('#')[1];
                    $("fieldset.languaged").css('display','none');
                    $("fieldset[data-language="+lang+"]").css('display','block');
                    $('.languages>a').removeClass('active');
                    $(this).addClass('active');
                    return false;
                });
                $('tbody td.activate a').live('click',function(){
                    var url=$(this).attr('href');
                    var $this=$(this);
                    $.ajax({
                        url:url,
                        success:function(data){
                            $this.parent().html(data);
                        }
                    })
                    return false;
                });
            });
        </script>

    </body>
</html>