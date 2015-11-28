<?php

class Controller_Admin_Rest_Carburations extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_Carburation::find('all');
        return $this->response($items);
    }
    
    public function post_carburation()
    {
        $title = Input::post('title');
        
        $entry = Model_Carburation::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $item = new Model_Carburation();
            $item->title = $title;
            $item->save();
        }
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}