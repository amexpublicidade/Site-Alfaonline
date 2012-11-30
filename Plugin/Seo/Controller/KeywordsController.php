<?PHP
class KeywordsController extends SeoAppController{    
    
    public function json_add($keyword){
        $this->autoRender=false;
        if($save=$this->Keyword->save(array('keyword'=>$keyword))) echo json_encode(array(
            'success'=>true,
            'id'=>$save['Keyword']['id'],
            'keyword'=>$save['Keyword']['keyword'],
        ));
        else echo json_encode (array(
            'success'=>false
        ));
    }
    
    public function json_delete($id){
        $this->autoRender=false;
        if($this->Keyword->delete($id)){
            echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('success'=>false));
        }
    }
}