<?PHP
$get_data=$this->data;
$get_data=array_shift($get_data);
$uid=isset($get_data['uid'])?$get_data['uid']:uniqid();
echo $this->Form->hidden('uid',array('value'=>$uid));
?>