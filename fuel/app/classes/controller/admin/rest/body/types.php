<?php
class Controller_Admin_Rest_Body_Types extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Body_Type::find('all');
        return $this->response($items);
    }
    
    public function post_body_type()
    {
        $title = Input::post('title');
                            
        $entry = Model_Body_Type::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $item = new Model_Body_Type();
            $item->title = $title;
            $item->save();
        }
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}