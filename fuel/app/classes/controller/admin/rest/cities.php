<?php

class Controller_Admin_Rest_Cities extends Controller_Rest
{

	public function get_list()
    {
        $items = Model_City::find('all');
        return $this->response($items);
    }
    
    public function post_citie()
    {
        $title = Input::post('title');
        
        $entry = Model_City::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(!count($entry)) {
            $item = new Model_City();
            $item->title = $title;
            $item->save();
        }
        
        
        return $this->response(array(
            'status' => 'ok',
            'count' => count($entry)
        ));
    }
    

}