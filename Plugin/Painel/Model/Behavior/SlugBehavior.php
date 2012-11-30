<?PHP
class SlugBehavior extends ModelBehavior{
    
    public function beforeSave(Model $model){
        parent::beforeSave($model);
        
        $setup=&$model->actsAs['Painel.Slug'];
        $data=&$model->data[$model->name];        
        if(isset($data['id']) && !empty($data['id'])) return true;
        
        $key=array_shift(array_keys($setup));
        $field=array_shift($setup);
        $slug=strtolower(Inflector::slug($data[$key]));
        $data[$field]=$slug;
        
        $find=$model->find('first',array('conditions'=>array("$model->name.$field"=>$slug)));
        if(is_array($find) && count($find)>0) $data[$field] =  uniqid("$slug-");
        
        return true;
        
    }
    
}