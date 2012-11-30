<?PHP
//CSS
$this->Html->css('/adm/ui/css/blitzer/jquery.ui.all.css',false,array('inline'=>false));
$this->Html->css('/adm/css/datetime.css',false,array('inline'=>false));

//SCRIPTS
$this->Html->script('/adm/ui/jquery.ui.js',array('inline'=>false));
$this->Html->script('/adm/ui/jquery.ui.datepicker.js',array('inline'=>false));
$this->Html->script('/adm/ui/i18n/jquery.ui.datepicker-pt-BR.js',array('inline'=>false));
$this->Html->script('/adm/ui/jquery.ui.slider.js',array('inline'=>false));

$default=array(
    'year'=>date('Y'),
    'month'=>date('m'),
    'day'=>date('d'),    
    'hour'=>date('H'),
    'minute'=>date('i'),
);

if(!empty($this->data)){
    $data=$this->data;
    $data=array_shift($data);
   
    $default=array(
        'year'=>date('Y',strtotime($data[$name])),
        'month'=>date('m',strtotime($data[$name])),
        'day'=>date('d',strtotime($data[$name])),
        'hour'=>date('H',strtotime($data[$name])),
        'minute'=>date('i',strtotime($data[$name])),
    );
}

?>

<fieldset class="box datetime" id="<?=$name?>">
    
    <legend><?=$label?></legend>    
    <div class="datecanvas" id="<?=$name?>-canvas"></div>
          
    <div class="hour">
        <h3 id="<?=$name?>-h3-hour"><?=$default['hour']?> horas</h3>
        <div class="slider" id="<?=$name?>-hour"></div>
    </div>
    
    <div class="minute">
        <h3 id="<?=$name?>-h3-minute"><?=$default['minute']?> minutos</h3>
        <div class="slider" id="<?=$name?>-minute"></div>
    </div>
    
    <?PHP
    echo $this->Form->hidden($name.'.year',array('id'=>$name.'-year','value'=>$default['year']));
    echo $this->Form->hidden($name.'.month',array('id'=>$name.'-month','value'=>$default['month']));
    echo $this->Form->hidden($name.'.day',array('id'=>$name.'-day','value'=>$default['day']));
    echo $this->Form->hidden($name.'.hour',array('id'=>$name.'-input-hour','value'=>$default['hour']));
    echo $this->Form->hidden($name.'.min',array('id'=>$name.'-input-minute','value'=>$default['minute']));
    //echo $this->Form->hidden($name.'.second',array('value'=>0));
    ?>
    
</fieldset>

<script type="text/javascript">
    jQuery(function($){        
        
        $('#<?=$name?>-canvas').datepicker({
            dateFormat:'yy-mm-dd',
            onSelect:function(date,inst){
                $("#<?=$name?>-day").val(inst.selectedDay);
                $("#<?=$name?>-month").val(inst.selectedMonth+1);
                $("#<?=$name?>-year").val(inst.selectedYear);
            }            
        }).datepicker('setDate','<?=$default['year']?>-<?=$default['month']?>-<?=$default['day']?>');
        
        $('#<?=$name?>-hour').slider({
            orientation:'vertical',
            min:0,
            max:23,
            value:<?=$default['hour']?>,
            slide:function(e,v){
                $("#<?=$name?>-input-hour").val(v.value);
                $("#<?=$name?>-h3-hour").html(v.value+' horas');
            }
        });
        
        $('#<?=$name?>-minute').slider({
            orientation:'vertical',
            min:0,
            max:59,
            value:<?=$default['minute']?>,
            slide:function(e,v){
                $("#<?=$name?>-input-minute").val(v.value);
                $("#<?=$name?>-h3-minute").html(v.value+' minutos');
            }
        });
    });
</script>