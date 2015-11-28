<?php

class Controller_Admin_Rest_Models extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Model::find('all');
        return $this->response($items);
    }
    
    public function post_model()
    {
        $title = Input::post('title');
                            
        $entry = Model_Model::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $item = new Model_Model();
            $item->title = $title;
            $item->save();
        }
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}