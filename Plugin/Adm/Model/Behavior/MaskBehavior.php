<?PHP
class MaskBehavior extends ModelBehavior{
    
    public $settings;
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        $this->settings=$config;
    }
    
    public function beforeSave(Model $model) {
        parent::beforeSave($model);
        pr($this->settings); exit;
        foreach($this->settings as $k=>$v){
            if(!isset($model->data[$model->name][$v])) continue;
            $model->data[$model->name][$v]=$this->maskConvert($model->data[$model->name][$v]);
            echo $model->data[$model->name][$v];
        }
        return true;
    }
    
    private function maskConvert($value){
           $value = preg_replace('/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/i','$3-$2-$1',$value);
           return date('Y-m-d H:i:s',strtotime($value));
    }    
}