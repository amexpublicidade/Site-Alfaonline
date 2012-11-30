<?PHP
class SlugBehavior extends ModelBehavior{
    
    public $settings;
    
    public function setup(Model $model, $config = array()) {
        parent::setup($model, $config);
        $this->settings=$config;
    }
    
    public function beforeSave(Model $model) {
        parent::beforeSave($model);
        foreach($this->settings as $k=>$v){
            if(!isset($model->data[$model->name][$k])) continue;
            $model->data[$model->name][$v]=strtolower(Inflector::slug($model->data[$model->name][$k]));
            
            $data=$model->find('first',array(
                'conditions'=>array(
                    $model->name.'.'.$v=>$model->data[$model->name][$v],
                    $model->name.'.id !='=>$model->data[$model->name]['id'],
                )
            ));
            
            if(isset($data) && count($data)>0 && !empty($data)) $model->data[$model->name][$v]=  uniqid ($model->data[$model->name][$v].'-');
        }
        return true;
    }
    
}